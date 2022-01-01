<!DOCTYPE html>
<html lang="en">
  <head>
  <?php
  session_start();
  echo $_SESSION['username'];
  echo $_SESSION['useremail'];
  echo $_SESSION['userpass'];
  ?>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <style>
      #card {
		background-color:black;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        max-width: 400px;
        margin: auto;
        text-align: center;
		color:white;
        font-family: arial;
		border-radius: 1rem;

      }

      #rollno {
        color: grey;
        font-size: 27px;
      }

      .link {
        text-decoration: none;
        font-size: 30px;
        color: black;
      }

    </style>
  </head>
  <body>
  <?php include 'navbar.php'; ?>
    <div class="row row-cols-1 row-cols-md-2 g-4" style="padding-top:5rem">
      <div class="col">
        <div id="card">
		<br>
          <img
            src="carson.jpg"
            style="
              width: 80%;
              display: block;
              margin-left: auto;
              margin-right: auto;
			  border-radius: 10rem;
            "
          />
		  <br>
          <h2>Carson Rodrigues</h2>
          <p id="rollno">1914010</p>
          <h4>Don Bosco College of Engineering</h4>
          <div style="margin: 24px">
			<a 
				href="https://github.com/rodriguescarson" 
				class="github link"
				><i class="fa fa-github-square" style="color:#FFFFFF"></i
			></a>
			&nbsp &nbsp
            <a
              href="https://www.linkedin.com/in/rodriguescarson/"
              class="linkedin link"
              ><i class="fa fa-linkedin" style="color: #0e76a8"></i
            ></a>
			&nbsp &nbsp
            <a href="https://api.whatsapp.com/send/?phone=917020286635"
              ><i class="fa fa-whatsapp link" style="color: #25d366"></i
            ></a>
          </div>
        </div>
      </div>
      <div class="col">
        <div id="card">
		<br>
          <img
            src="yash.jpg"
            style="
              width: 80%;
              display: block;
              margin-left: auto;
              margin-right: auto;
			  border-radius: 10rem;
            "
          />
          <br>
          <h2>Yash Karapurkar</h2>
          <p id="rollno">1914057</p>
          <h4>Don Bosco College of Engineering</h4>
          <div style="margin: 24px">
			<a 
				href="https://github.com/whyKara" 
				class="github link"
				><i class="fa fa-github-square" style="color:#FFFFFF"></i
			></a>
			&nbsp &nbsp
            <a
              href="https://www.linkedin.com/in/yash-karapurkar-59b92b1b7/"
              class="linkedin link"
              ><i class="fa fa-linkedin" style="color: #0e76a8"></i
            ></a>
			&nbsp &nbsp
            <a href="https://api.whatsapp.com/send/?phone=917264964649"
              ><i class="fa fa-whatsapp link" style="color: #25d366"></i
            ></a>
          </div>
        </div>
      </div>
      <div class="col">
        <div id="card">
		<br>
          <img
            src="nihal.jfif"
            style="
              width: 80%;
              display: block;
              margin-left: auto;
              margin-right: auto;
			  border-radius: 10rem;
            "
          />
          <br>
          <h2>Nihal Kamat</h2>
          <p id="rollno">1914024</p>
          <h4>Don Bosco College of Engineering</h4>
          <div style="margin: 24px">
			<a 
				href="https://github.com/starix2436" 
				class="github link"
				><i class="fa fa-github-square" style="color:#FFFFFF"></i
			></a>
			&nbsp &nbsp
            <a
              href="https://www.linkedin.com/in/nihalkamat2436/"
              class="link linkedin"
              ><i class="fa fa-linkedin" style="color: #0e76a8"></i
            ></a>
			&nbsp &nbsp
            <a href="https://api.whatsapp.com/send/?phone=919405920393" class="link"
              ><i class="fa fa-whatsapp" style="color: #25d366"></i
            ></a>
          </div>
        </div>
      </div>
      <div class="col">
        <div id="card">
		<br>
          <img
            src="histon.jpg"
            style="
              width: 80%;
              display: block;
              margin-left: auto;
              margin-right: auto;
			  border-radius: 10rem;
            "
          />
          <br>
          <h2>Histon Pango</h2>
          <p id="rollno">1914029</p>
          <h4>Don Bosco College of Engineering</h4>
          <div style="margin: 24px">
			<a 
				href="https://github.com/Hestonpango" 
				class="github link"
				><i class="fa fa-github-square" style="color:#FFFFFF"></i
			></a> 
			&nbsp &nbsp
            <a
              href="https://www.linkedin.com/in/histon-pango-34797718b/"
              class="linkedin link"
              ><i class="fa fa-linkedin" style="color: #0e76a8"></i
            ></a>
			&nbsp &nbsp
            <a href="https://api.whatsapp.com/send/?phone=918379080567" class="link"
              ><i class="fa fa-whatsapp" style="color: #25d366"></i
            ></a>
          </div>
        </div>
      </div>
      
    </div>
    
    </br>
    </br>
    <hr class="featurette-divider" />
    <?php include 'footer.php'; ?>
  <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
