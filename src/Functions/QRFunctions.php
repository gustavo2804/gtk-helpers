<?php

function rawQRCodeForItem($data)
{
	$qr_image = null;
	$qr_label = null;

	$qrCode = new \Endroid\QrCode\QrCode($data);

	
	$endroid_image = null;
	if ($qr_image) 
	{ 
		
		$qr_printing_item["qr_image"] = $qr_image; 
		// https://developer.wordpress.org/reference/functions/get_attached_file/
		// $logo_path = $this->assets_path.'/logo-sendero-educativo-230-x-207.png';
		/// $endroid_image = \Endroid\QrCode\Logo\Logo::create($logo_path)->setResizeToWidth(50);
	}
	

	$endroid_label = null;
	if ($qr_label) 
	{ 
		$qr_printing_item["qr_label"] = $qr_label; 

		$endroid_label = \Endroid\QrCode\Label\Label::create($qr_label)->setTextColor(new \Endroid\QrCode\Color\Color(0, 0, 0));

	}

	$writer = new \Endroid\QrCode\Writer\PngWriter();
	$raw_qr_code = null;

	if ($endroid_image && $endroid_label) {
		$raw_qr_code = $writer->write($qrCode, $endroid_image, $endroid_label);
	} else if ($endroid_image) {
		$raw_qr_code = $writer->write($qrCode, $endroid_image);
	} else {
		$raw_qr_code = $writer->write($qrCode);
	}

	return $raw_qr_code;
}

function embeddableQRCodeForItem($item)
{
	$raw_qr_code = rawQRCodeForItem($item);
	$base64_qr_code = base64_encode($raw_qr_code->getString());
	$embeddable_qr_code = "data:image/png;base64,{$base64_qr_code}";
	return $embeddable_qr_code;
}


/*

		if (isset($_GET['download'])) 
		{
			$customer_filename   = 'qr_code_for_printing_'.$printing_id.'.zip';

			$this->serve_zip($customer_filename, function ($zip) use ($posts) {
				foreach ($posts as $post)
				{
					$filename = $post->post_title.'.png';
					$zip->addFromString($filename, $this->qr_code_for_post($post));
				}
			});
		}

		public function serve_zip($file_name, $closure) // function ($zip) use () {}
	{
		if ( ! function_exists( 'WP_Filesystem' ) ) {
			require_once ABSPATH . 'wp-admin/includes/file.php';
		}
		WP_Filesystem();
		
		$server_file_name    = wp_tempnam(); // sys_get_temp_dir();

		$permissions = fileperms($server_file_name);
		$hasWritePermission = ($permissions & 0200) > 0;

		if (!$hasWritePermission)
		{
			echo 'No permission to write to temp_dir at `wp_tempnam()`';
			exit();
		}

		$zip = new \ZipArchive();

		if ($zip->open($server_file_name, \ZipArchive::CREATE|\ZipArchive::OVERWRITE))
		{
			$closure($zip);
		}
		else
		{
			echo 'Failed, code:' . $res;
			exit();
		}

		// Close the archive
		$zip->close();

		
		header('Content-Type: application/zip');
		header('Content-Disposition: attachment; filename="'.$file_name.'"');
		readfile($server_file_name);
		unlink($server_file_name);


		exit();
	}
*/
