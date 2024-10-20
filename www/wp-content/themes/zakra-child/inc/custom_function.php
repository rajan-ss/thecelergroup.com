<?php
if ( is_admin() ) {
    add_action( 'admin_menu', 'wstheme_import_products_menu_entry', 100 );
}
require_once('SimpleXLS.php');
use Shuchkin\SimpleXLS;

function wstheme_import_products_menu_entry() {
    add_submenu_page(
        'edit.php?post_type=product',
        __( 'Product Image Zip' ),
        __( 'Product Image Zip Import' ),
        'manage_woocommerce', // Required user capability
        'import-product-zip',
        'wstheme_import_product_zip'
    );

    add_submenu_page(
        'edit.php?post_type=product',
        __( 'Product Import Excell' ),
        __( 'Product Import Excell' ),
        'manage_woocommerce', // Required user capability
        'import-product',
        'wstheme_import_product_page'
    );

   
}

function wstheme_upload_file_by_url( $image_url ) {

	// it allows us to use download_url() and wp_handle_sideload() functions
	require_once( ABSPATH . 'wp-admin/includes/file.php' );

	// download to temp dir
	$temp_file = download_url( $image_url );

	if( is_wp_error( $temp_file ) ) {
		return false;
	}

	// move the temp file into the uploads directory
	$file = array(
		'name'     => basename( $image_url ),
		'type'     => mime_content_type( $temp_file ),
		'tmp_name' => $temp_file,
		'size'     => filesize( $temp_file ),
	);
	$sideload = wp_handle_sideload(
		$file,
		array(
			'test_form'   => false // no needs to check 'action' parameter
		)
	);

	if( ! empty( $sideload[ 'error' ] ) ) {
		// you may return error message if you want
		return false;
	}

	// it is time to add our uploaded image into WordPress media library
	$attachment_id = wp_insert_attachment(
		array(
			'guid'           => $sideload[ 'url' ],
			'post_mime_type' => $sideload[ 'type' ],
			'post_title'     => basename( $sideload[ 'file' ] ),
			'post_content'   => '',
			'post_status'    => 'inherit',
		),
		$sideload[ 'file' ]
	);

	if( is_wp_error( $attachment_id ) || ! $attachment_id ) {
		return false;
	}

	// update medatata, regenerate image sizes
	require_once( ABSPATH . 'wp-admin/includes/image.php' );

	wp_update_attachment_metadata(
		$attachment_id,
		wp_generate_attachment_metadata( $attachment_id, $sideload[ 'file' ] )
	);

	return $attachment_id;

}

function create_guid_by_sku($sku){
     WP_Filesystem();
    $destination = wp_upload_dir();
    $destination_path = $destination['basedir'].'/zip';
    $destination_URL = $destination['baseurl'].'/zip';
    $files1 = scandir($destination_path);
      if(!empty($files1)){
    foreach($files1 as $filename){
        if(!empty($filename) && strpos($filename, $sku) !== false){
            $fullImagePath=$destination_path.'/'.$filename;
            $fullImageURL=$destination_URL.'/'.$filename;
             /* Start Image upload */
             $id= wstheme_upload_file_by_url($fullImageURL);
             unlink($fullImagePath);
           return $id;
             /* End Image upload */
           

        }
    }
    }
    return false;
}

function wstheme_parse_other_taxomomy_field($value) {
    // Get taxonomy
    $taxonomy = 'product_cat';

    // Exists?
    if (!taxonomy_exists($taxonomy)) {
        return;
    }

    if (empty($value)) {
        return array();
    }
    $separator=',';
    $names = explode( $separator, $value );
    $taxs = array();

    foreach ($names as $name) {
        $parent = null;
        $other_terms = array_map( 'trim', explode( '>', $name ) );
      
        $total  = count( $other_terms );

        foreach ( $other_terms as $index => $_term ) {
                $term = term_exists( $_term, $taxonomy, $parent );
                if ( is_array( $term ) ) {
                        $term_id = $term['term_id'];                             
                }else {
                        $term = wp_insert_term( $_term, $taxonomy, array( 'parent' => intval( $parent ) ) );
                        if ( is_wp_error( $term ) ) {
                                break; 
                        }
                        $term_id = $term['term_id'];
                }
                if ( ( 1 + $index ) === $total ) {
                        $taxs[] = $term_id;
                } else {
                       $taxs[] = $term_id;
                        $parent = $term_id;                        
                }
        }
    }
    return $taxs;

}


function wstheme_import_product_page() {
    if(isset($_GET['page']) && $_GET['page']=='import-product'){
      
        
        echo '<div class="wrap">';
        echo '<div class="postbox">';
        if(isset($_FILES['wsthemecsvfile']['name']) && !empty($_FILES['wsthemecsvfile']['name']))
        {
        $target_file = $_FILES["wsthemecsvfile"]["name"];
        $csvFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $row=1;
        $pcate=$ccate='';
        $catcount=0;
    if($csvFileType == "csv") {
       $handle = fopen($_FILES['wsthemecsvfile']['tmp_name'], "r");
     
      while($data = fgetcsv($handle))
		{
            if($row > 1 && !empty($data[0])){
                $price=$data[0];
                $sku=$data[1];
                $name=$data[2];
                $descriptions=$data[3];
                $categorys=$data[4];
              
               
                $p_id = wc_get_product_id_by_sku( $sku );
                if(!empty($p_id)){
                $product = wc_get_product($p_id);
                }else{
                $product = new WC_Product_Simple();
                }
                $product->set_name($name); // product title
                $product->set_sku($sku); // Should be unique
                $product->set_regular_price($price ); // in current shop currency
                $product->set_short_description($descriptions);
                /* Image Serach and return as attchement id */
                $imgID=create_guid_by_sku($sku);
                if(!empty($imgID)){
                $product->set_image_id($imgID);
                }
                if(isset($categorys) && !empty($categorys)){
                    $texonomyids=wstheme_parse_other_taxomomy_field($categorys);
                    $product->set_category_ids($texonomyids); 
                }
              
                $product->save();
                $arr[]=$row;
                

            }
           
			$row++;
        }
    } elseif($csvFileType == "xls" && isset($_FILES['wsthemecsvfile']['tmp_name'])) {
       $tmp_name=$_FILES['wsthemecsvfile']['tmp_name'];
      if ($xls = SimpleXLS::parse($tmp_name)) {
           
          foreach ($xls->rows() as $k => $data) {
            if($k > 8 && !empty($data[3])){
               $price=$data[3];
                $sku=$data[4];
                $name=$data[5];
                $descriptions=$data[8];
                if(!empty($pcate) && !empty($ccate)){
                    $categorys= $pcate.'>'.$ccate;
                }elseif(empty($ccate)){
                    $categorys= $pcate;
                }
               
               // echo "\$price:$price\$sku:$sku\$name:$name\$descriptions:$descriptions\$categorys:$categorys<br><br><br><br>";
                $p_id = wc_get_product_id_by_sku( $sku );
                if(!empty($p_id)){
                $product = wc_get_product($p_id);
                }else{
                $product = new WC_Product_Simple();
                }
                $product->set_name($name); // product title
                $product->set_sku($sku); // Should be unique
                $product->set_regular_price($price ); // in current shop currency
                $product->set_short_description($descriptions);
                /* Image Serach and return as attchement id */
                $imgID=create_guid_by_sku($sku);
                if(!empty($imgID)){
                $product->set_image_id($imgID);
                }
                if(isset($categorys) && !empty($categorys)){
                    $texonomyids=wstheme_parse_other_taxomomy_field($categorys);
                    $product->set_category_ids($texonomyids); 
                } 
               $product->save();
                $arr[]=$k;
                $catcount=1;

            }elseif($k >= 8 && !empty($data[0])){
              if($catcount==0){
                    $pcate=$data[0];
                }elseif($catcount==1){
                    $ccate=$data[0];
                }elseif($catcount==2){
                    $pcate=$ccate;
                    $ccate=$data[0];
                }                
                $catcount++;
            }             
        }  
         } else {
            echo SimpleXLS::parseError();
        }

  } else{
        echo '<div class="notice notice-warning is-dismissible">
        <p>There was an error related to file format.</p></div>';  
    }
}
    if(isset($arr) && is_array($arr)){
        echo '<div class="notice notice-success is-dismissible">
        <p>Data has been successfully import.</p></div>'; 
       
    }
$uploads = wp_upload_dir();
$csvURL = $uploads['baseurl'].'/sample_data.csv'; 
        ?>
        <div class="ws-dowloadbtn" style="text-align: right;">
               <a class="button button-primary" href="<?php echo $csvURL;?>" download>
                 Download Sample CSV File
                    </a>
                </div> 
        <div class="custom-upload postbox" style="padding: 10px; max-width: 500px; margin: 50px auto; width: 100%;">
            <form method="POST" action="<?php echo admin_url( 'edit.php?post_type=product&page=import-product' ); ?>" enctype="multipart/form-data">
                <div class="custom-upload-field">
                    
                <label>Select XLS/CSV File</label><br><br>
                    <input type="file" name="wsthemecsvfile" id="wsthemecsvfile">
                </div><br><br>   
                <input class="button button-primary" type="submit" value="Import" />
              
            </form>
        </div>   
       
    <?php
  

     echo '</div>';
     echo '</div>';
    }
}

/*  Function to unzip the folder and remove the subfolder in dir*/
function wstheme_import_product_zip() {

if(isset($_GET['page']) && $_GET['page']=='import-product-zip'){
    echo '<div class="wrap">';
    echo '<div class="postbox">';
 WP_Filesystem();
$destination = wp_upload_dir();
$destination_path = $destination['basedir'].'/zip';
if (!file_exists($destination_path)) {
    mkdir($destination_path, 0777, true);
}
if(isset($_FILES['zip_file']["tmp_name"]) && !empty($_FILES['zip_file']["tmp_name"])){
    $target_file = $_FILES["zip_file"]["name"];
    $zipFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if($zipFileType == "zip") {
   $unzipfile = unzip_file($_FILES["zip_file"]["tmp_name"], $destination_path);
   
   if ( $unzipfile ) {
     /* Start Read all sub folder in zip dir */
    $dir = new DirectoryIterator($destination_path);
    foreach ($dir as $fileinfo) {
    if ($fileinfo->isDir() && !$fileinfo->isDot()) {
    $mis_dir= $destination_path.'/'.$fileinfo->getFilename();
    $files1 = scandir($mis_dir);
    if(!empty($files1)){
    foreach($files1 as $filename){
    if(!empty($filename)){
        $old=$mis_dir.'/'.$filename;
        $new=$destination_path.'/'.$filename;            
         rename($old, $new);
        }
        }
        }
    rmdir($mis_dir);
    }
    }
    /*End Read all sub folder in zip dir*/
    echo '<div class="notice notice-success is-dismissible">
    <p>Successfully unzipped the file!</p></div>';
           
   } else {
    echo '<div class="notice notice-warning is-dismissible">
    <p>There was an error unzipping the file.</p></div>';
          
   } 
 }else {
    echo '<div class="notice notice-warning is-dismissible">
    <p>There was an error related to file format.</p></div>';         
 } 
      
}
    ?>
   
    <div class="custom-upload postbox" style="padding: 10px; max-width: 500px; margin: 50px auto; width: 100%;">
        <form method="POST" action="<?php echo admin_url( 'edit.php?post_type=product&page=import-product-zip' ); ?>" enctype="multipart/form-data">
            <div class="custom-upload-field">
                
            <label>Select image Zip</label><br><br>
                <input type="file" name="zip_file" id="fileToUpload">
            </div><br><br>   
            <input class="button button-primary" type="submit" value="Import" />
        </form>
    </div>    
<?php
 echo '</div>';
 echo '</div>';
}

}