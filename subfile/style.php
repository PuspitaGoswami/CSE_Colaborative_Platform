

html, body{
	height: 100%;
	overflow: hidden;
	padding: 0px;
	background: #C5DDEB;
margin:0px;}


a,p{
		font-size: 14px;
		 font-family: helvetica;
		 color:  #F2F5F8;
		 text-decoration:none;


		}

#container{
	box-shadow: 2px 2px 10px #000000; 
	width: 850px;
	height: 90%;
	margin: 2% auto;
	background: #444753;
	border-radius: 1%;
	overflow: hidden;}
#menu{
 	background: #006669;
		color: white;
		padding: 1%;
		font-size: 30px;
			}
	#left-col, #right-col{
				position: relative;
				float: left;
				height: 90%;

			}
	#left-col{
				width: 30%;

			}
	#right-col{
				width: 69%;
				border: 1px solid #efefef;
				  background: #F2F5F8;


			}

	#left-col-container,#right-col-container{
				width: 100%;
				height: 100%;
				margin: 0px auto;
				overflow: auto;

			}
	#right-col-container,#user{
				font-size:20px;
				margin-bottom:20px;
				margin-left:5px;
				color:#006669;
				font-weight:bold;
    }
    #blank{
    text-align:center;
    margin-top:150px;
    color:#ababab;
}



		#left-col-container{
				  background: #444753;



	}


	.grey-back{
				border: none;
				padding: 5px;
				background:#444753;

				margin: 0px auto;
				margin-top: 2px;
				overflow: auto;
				padding-bottom: 20px;
				margin-left:15px;
			}
	.image{
				float: left;
				width: 50px;
				height: 50px;
				margin-right:5px;

			}
		.image2{
				float: left;
				width: 50px;
				height: 50px;
				margin-right:5px;
				border-radius:60%;

			}

	#message-container{
					height: 80%;
					overflow: auto;
					color: #434651;
				}





			.grey-message, .white-message{
				border:none;
				width: 70%;
				line-height:10px;
				padding: 5px;
				margin: 0px auto;
				margin-top: 2px;
				overflow: auto;
				color: white;
				font-size: 16px;
			    border-radius: 7px;
				 border-top-right-radius: 5px;
 				 border-bottom-right-radius: 5px;



			}

			.grey-message{
				background:#86BB71;
				float:right;
				margin-right:15px;
			}
			.white-message{
			 background: #94C2ED;
			 float:left;

		}

		#new-message{
				display: none;
				box-shadow: 2px 10px 30px #000000;
				width: 500px;
				position: fixed;
				top: 20%;
				background: white;
				z-index: 2;
				left: 50%;
				transform: translate(-50%,0);
				border-radius: 5px;
				overflow: auto;
			}

			.m-header, .m-footer{
				background: #006669;
				margin: 0px;
				color: white;
				padding: 5px;

			}
			.m-header{
				font-size: 20px;
				text-align: center;
			}
			.m-body{
				padding: 5px;
			}
				.textarea{
				margin-top:50px;
				width: 91%;
				height: 15%;
				position: absolute;
				bottom: 0%;
				margin: 0px auto;
				margin-left:5px;
				      border:#006669;
      padding: 10px 20px;
      font: 14px/22px "Lato", Arial, sans-serif;
			}

			.message-input{
				width: 96%;
			}

.online, .offline {
    margin-right: 3px;
    font-size: 10px;
  }
  .online {
  color: #86BB71;
}
  
.offline {
  color:  #E38968;
}

.im{
	height:40px;
	width:40px;
	border-radius:60%;
}

