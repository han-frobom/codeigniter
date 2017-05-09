<html>
	<head>
		<style>.container{

}
.header{

	width:100%;
	height: 50px;
	background-color: burlywood;
	font-color:white;
	font-family:cursive;
	font-size:18px;
}
.content{

	height: auto;
	left:0px;


}

.left-content{

width:15%;
height:500px;
background-color: azure;
float:left;
}
.right-content{
width:85%;
height: 500px;
background-color: khaki;
float: left;
}
.footer{

	clear:both;
	width:100%;
	height: 50px;
	background-color: burlywood;

}</style>
	</head>
	<body>
		<div class="wrapper">
			<div class="header">
				This is my very fist CI tutorial...!!
			</div>
			<div class="content">
				<div class="left-content">
					<ul class="nav navbar-nav navbar-right">
				<?php if ($this->session->userdata('login')){ ?>
				<li><p class="navbar-text">Hello <?php echo $this->session->userdata('uname'); ?></p></li>
				<li><a href="<?php echo base_url(); ?>index.php/home/logout">Log Out</a></li>
				<?php } else { ?>
				<li><a href="<?php echo base_url(); ?>index.php/login">Login</a></li>
				<li><a href="<?php echo base_url(); ?>index.php/users">Show Users Detail</a></li>
				<li><a href="<?php echo base_url(); ?>index.php/signup">Signup</a></li>
				<?php } ?>
			</ul>
				</div>
				<div class="right-content"></div>
			</div>
			<div class="footer"></div>
		</div>
	</body>
</html>