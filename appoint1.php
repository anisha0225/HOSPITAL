<!DOCTYPE html>
<html>
<head>
    <title>Doctor Appointment</title>
    
    <style>
       @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');
         *{
   font-family: 'Poppins', sans-serif;
   margin:0; padding:0;
   box-sizing: border-box;
   outline: none; border: none;
   text-decoration: none;
}
body{
    background-color: whitesmoke;
}

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .box {
            background-color: whitesmoke;
            border-radius: 10px;
            padding: 50px;
            /*box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);*/
            box-shadow: 4px 8px 4px 4px #888888;
            text-align: center;
            font-size: 15px;

        }
        .write{
            font-size: 18px;
            padding: 5px;
        }
        .search{
           
            font-size: 25px;
            background-color: beige;
            padding: 4px;
        }
       /* .submit{
            padding: 5px 5px;

            font-size: 25px;
            background-color: green;
            color:antiquewhite;
        }*/
        .btn{
   display: block;
   width: 100%;
   cursor: pointer;
   border-radius: .5rem;
   margin-top: 1rem;
   font-size: 1.3rem;
   padding:1rem 3rem;
   background: green;
   color:white;
   text-align: center;
}

.btn:hover{
   background: black;
}

  

        /* Add your CSS styling here */

    </style>
</head>
<body>
    <div class="container">
        <div class="box">
        <h1>Doctor Appointment</h1>
        <form method="post" action="appoint.php">
            <div class="write">
            <label for="specification" >Enter Doctor's Specification:</label>
            </div>
            <input type="text"  class="search"id="specification" name="specification" required>
            <div class="write">
            <label for="hospitalname" >Enter Place:</label>
            </div>
            <input type="text"  class="search"id="hospitalname" name="hospitalname" required>
            <button type="submit" class="btn">Search</button>
            <a href="dashboard1.php" class="btn">go back <-</a>
        </form>
    </div>
    </div>
</body>
</html>
