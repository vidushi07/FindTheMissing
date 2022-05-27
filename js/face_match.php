<?php include('includes/js.php'); ?>
<script>

const settings = {
	"async": true,
	"crossDomain": true,
	"url": "https://kairosapi-karios-v1.p.rapidapi.com/enroll",
	"method": "POST",
	"headers": {
		"content-type": "application/json",
		"x-rapidapi-key": "f9be5c22aamsh7b40dd3a5ef3a8fp1c20bcjsn75433a5647d3",
		"x-rapidapi-host": "kairosapi-karios-v1.p.rapidapi.com"
	},
	"processData": false,
	"data": "{
  \"image\": \"http://media.kairos.com/kairos-elizabeth.jpg\",
  \"gallery_name\": \"MyGallery\",
  \"subject_id\": \"Elizabeth\"
}"
};

$.ajax(settings).done(function (response) {
	console.log(response);
});

</script>