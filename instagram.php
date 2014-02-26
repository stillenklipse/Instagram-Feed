<style type="text/css">
.ig-wrapper{
	border: 3px solid #33363b;
    font-family: arial;
    font-size: 14px;
    margin: 25px;
    text-align: center;
    width: 100%;
    background: #33363b;
    max-width: 600px;
}
.ig-wrapper img{
	width: 100%;
	height: auto;
	max-width: 600px;
	border-bottom: 2px solid #ccc;
}
.ig-wrapper div{
	margin: 10px;
	text-align: left;
	color: #fff;

}
</style>

<?php
//513373382
$api = file_get_contents("https://api.instagram.com/v1/users/{user_id}/media/recent/?client_id=7cbaa02501ea47cd928a426d022c4b72#");
$json = json_decode($api,true);

foreach($json['data'] as $data){
	makeLayout($data);
}

function makeLayout($ig){
	foreach($ig['tags'] as $data){
		if($data == 'sketch'){
			?>
			
			<div class="ig-wrapper">
			<img src="<?php echo $ig['images']['standard_resolution']['url'] ?>"><br />
				<div class="details">
					<strong>Description:</strong> <?php echo $ig['caption']['text'] ?><br />
					<strong>Likes:</strong><?php echo $ig['likes']['count'] ?><br />
				</div>
			</div>

			<?php
		}
		
	}
}
?>
