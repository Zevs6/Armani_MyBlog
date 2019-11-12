
		<style>
			.box{
			position:fixed;
			right:10px;
			bottom: 10px;
			height:30px;
			width: 50px; 
			text-align:center;
			padding-top:20px; 
			background-color: lightblue;
			border-radius: 20%;
			overflow: hidden;
			cursor:pointer;
			}
			.box:hover:before{
			top:50%
			}
			.box:hover .box-in{
			visibility: hidden;
			}
			.box:before{
			position: absolute;
			top: -50%;
			left: 50%;
			transform: translate(-50%,-50%);
			content:'回到顶部';
			width: 33px;
			color:#fff9f9;
			font-weight:bold;
			} 
			.box-in{
			visibility: visible;
			display:inline-block;
			height:20px;
			width: 20px;
			border: 3px solid black;
			border-color: white transparent transparent white;
			transform:rotate(45deg);
			}
			</style>
			<div id="box" class="box">
				<div class="box-in"></div>
			</div> 
			<script>
				var timer = null;
				box.onclick = function(){
				cancelAnimationFrame(timer);
				timer = requestAnimationFrame(function fn(){
				var oTop = document.body.scrollTop || document.documentElement.scrollTop;
				if(oTop > 0){
				document.body.scrollTop = document.documentElement.scrollTop = oTop - 50;
				timer = requestAnimationFrame(fn);
				}else{
				cancelAnimationFrame(timer);
				} 
				});
				}
			</script>

