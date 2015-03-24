<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo ($this->title); ?></title>

    <!-- Bootstrap -->
    <link href="__PUBLIC__/bootstrap-3.3.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="__CSS__/style.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
       <div class="col-md-2">
       后台管理系统
       </div>
	<!-- 头部导航-->
	   <div class="col-md-10">
		<nav class="navbar navbar-default">
		  <div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" href="#">Brand</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			  <ul class="nav navbar-nav">
				<li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
				<li><a href="#">Link</a></li>
				<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
				  <ul class="dropdown-menu" role="menu">
					<li><a href="#">Action</a></li>
					<li><a href="#">Another action</a></li>
					<li><a href="#">Something else here</a></li>
					<li class="divider"></li>
					<li><a href="#">Separated link</a></li>
					<li class="divider"></li>
					<li><a href="#">One more separated link</a></li>
				  </ul>
				</li>
			  </ul>
		   
			  <ul class="nav navbar-nav navbar-right">
			
				<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo session('admin.unick');?><span class="caret"></span></a>
				  <ul class="dropdown-menu" role="menu">
					<li><a href="<?php echo U('public/logout');?>">退出</a></li>
					<li><a href="<?php echo U('Person/edit_nick');?>">编辑昵称</a></li>
					<li><a href="<?php echo U('Person/edit_pass');?>">更改密码</a></li>				
				  </ul>
				</li>
			  </ul>
			</div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
		</div>
	  </div>
	  <!-- 头部导航-->
	  <div class="row">
	 
		  <div class="col-md-2">
			  <div class="list-group">
				  <a class="list-group-item list-group-item-black" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
					Link with href
				  </a>
				  <div class="collapse" id="collapseExample">
					  <a href="#" class="list-group-item active">
						Cras justo odio
					  </a>
					  <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
					  <a href="#" class="list-group-item">Morbi leo risus</a>
					  <a href="#" class="list-group-item">Porta ac consectetur ac</a>
					  <a href="#" class="list-group-item">Vestibulum at eros</a>
				   </div>
			  </div>
		  </div>	 
		  <div class="col-md-8">
		   
  <div class="panel panel-default">
				  <!-- Default panel contents -->
				  <div class="panel-heading">Panel heading</div>
				  <div class="panel-body">
					<p>...</p>
				  </div>
				</div>
				   <table class="table table-bordered">
					  <thead>
						<tr>
						  <th>#</th>
						  <th>First Name</th>
						  <th>Last Name</th>
						  <th>Username</th>
						</tr>
					  </thead>
					  <tbody>
						<tr>
						  <th scope="row">1</th>
						  <td>Mark</td>
						  <td>Otto</td>
						  <td>@mdo</td>
						</tr>
						<tr>
						  <th scope="row">2</th>
						  <td>Jacob</td>
						  <td>Thornton</td>
						  <td>@fat</td>
						</tr>
						<tr>
						  <th scope="row">3</th>
						  <td>Larry</td>
						  <td>the Bird</td>
						  <td>@twitter</td>
						</tr>
					  </tbody>
					</table>
				   <div class="row">
				    <div class="col-md-6">
						<div class="bs-example">
							
							<div class="btn-group">
							  <button type="button" class="btn btn-primary">Primary</button>
							  
							</div><!-- /btn-group -->
							<div class="btn-group">							  
							  <button type="button" class="btn btn-success">Success</button>
							</div><!-- /btn-group -->
							
						</div>
					</div>
				    
					  <nav>
					  
						  <ul class="pagination">
							<li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
							<li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">5</a></li>
							<li><a href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
						 </ul>
					  </nav>
					</div>
				
				  
				  <div class="row">
					  <div class="col-md-12">
						 <ul class="nav nav-tabs">
						  <li role="presentation" class="active"><a href="#">Home</a></li>
						  <li role="presentation"><a href="#">Profile</a></li>
						  <li role="presentation"><a href="#">Messages</a></li>
						</ul>					
					  </div>
					  <div class="col-md-12">
					  <form class="form-horizontal">
						  <div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
							<div class="col-sm-10">
							  <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
							</div>
						  </div>
						  <div class="form-group">
							<label for="inputPassword3" class="col-sm-2 control-label">Password</label>
							<div class="col-sm-10">
							  <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
							</div>
						  </div>
						    <div class="form-group">
							   <label for="textinfo" class="col-sm-2 control-label">text</label>
							   <div class="col-sm-10">
								<textarea class="form-control" rows="3" id="textinfo"></textarea>
							  </div>
						    </div>
							<div class="form-group">
							 <label for="textinfo" class="col-sm-2 control-label">checkbox</label>
							  <div class="col-sm-10">
							   <label class="checkbox-inline">
								  <input type="checkbox" id="inlineCheckbox1" value="option1"> 1
								</label>
								<label class="checkbox-inline">
								  <input type="checkbox" id="inlineCheckbox2" value="option2"> 2
								</label>
								<label class="checkbox-inline">
								  <input type="checkbox" id="inlineCheckbox3" value="option3"> 3
								</label>
							  </div>
						    </div>
							<div class="form-group">
							 <label for="textinfo" class="col-sm-2 control-label">radio</label>
							  <div class="col-sm-10">
							    <div class="radio">
									<label class="radio-inline">
									  <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> 1
									</label>
									<label class="radio-inline">
									  <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> 2
									</label>
									<label class="radio-inline">
									  <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> 3
									</label>
								</div>
							  </div>
						    </div>
							<div class="form-group">
							 <label for="textinfo" class="col-sm-2 control-label">select</label>
							  <div class="col-sm-10">
							      <select class="form-control">
									  <option>1</option>
									  <option>2</option>
									  <option>3</option>
									  <option>4</option>
									  <option>5</option>
								   </select>
							  </div>
						    </div>
						<div class="form-group">
						    <label for="textinfo" class="col-sm-2 control-label">file</label>
							<div class="col-sm-10">
							  <input type="file" id="exampleInputFile">
							</div>
						  </div>
						 
						  <div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
							  <div class="checkbox">
								<label>
								  <input type="checkbox"> Remember me
								</label>
							  </div>
							</div>
						  </div>
						  
						  <div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
							   <button type="submit" class="btn btn-primary">Submit</button>
							</div>
						  </div>
						</form>
					   </div>
					  
				  </div>
			  </div>		 
			 
		  </div>
	  </div>
	  
   </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="__PUBLIC__/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="__PUBLIC__/bootstrap-3.3.2-dist/js/bootstrap.min.js"></script>
  </body>
</html>