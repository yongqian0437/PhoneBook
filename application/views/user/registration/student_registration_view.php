<style>
    @import url('https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Nunito';
        font-weight: 600;
    }

    body {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 10px;
        background: #6B9080;
        font-size: 15px;
    }

    .container {
        max-width: 900px;
        width: 100%;
        background-color: #EAF4F4;
        padding: 25px 30px;
        border-radius: 5px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
    }

    .container .title {
        font-size: 25px;
        font-weight: 900;
        position: relative;
    }

    .container .title::before {
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        height: 3px;
        width: 30px;
        border-radius: 5px;
        background: linear-gradient(135deg, #71b7e6, #9b59b6);
    }

    .content form .user-details {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin: 20px 0 12px 0;
    }

    form .user-details .input-box {
        margin-bottom: 15px;
        width: calc(100% / 2 - 20px);
    }

    form .input-box span.details {
        display: block;
        font-weight: 600;
        margin-bottom: 5px;
    }

    .user-details .input-box input {
        height: 45px;
        width: 100%;
        outline: none;
        font-size: 16px;
        border-radius: 5px;
        padding-left: 15px;
        border: 1px solid #ccc;
        border-bottom-width: 2px;
        transition: all 0.3s ease;
    }

    .user-details .input-box input:focus,
    .user-details .input-box input:valid {
        border-color: #9b59b6;
    }

    form .gender-details .gender-title {
        font-size: 20px;
        font-weight: 600;
    }

    form .category {
        display: flex;
        width: 30%;
        margin: 14px 0;
        justify-content: space-between;
    }

    form .category label {
        display: flex;
        align-items: center;
        cursor: pointer;
    }

    form .category label .dot {
        height: 18px;
        width: 18px;
        border-radius: 50%;
        margin-right: 10px;
        background: #d9d9d9;
        border: 5px solid transparent;
        transition: all 0.3s ease;
    }

    #dot-1:checked~.category label .one,
    #dot-2:checked~.category label .two {
        background: #9b59b6;
        border-color: #d9d9d9;
    }

    form input[type="radio"] {
        display: none;
    }

    form .button {
        height: 45px;
        width: 100%;
        margin: 35px 0
    }

    form .button input {
        height: 100%;
        width: 100%;
        border-radius: 5px;
        border: none;
        color: #000000;
        font-size: 18px;
        font-weight: 600;
        letter-spacing: 1px;
        cursor: pointer;
        transition: all 0.3s ease;
        background: #CCE3DE;
    }

    form .button input:hover {
        background: #6B9080;
    }

    @media(max-width: 584px) {
        .container {
            max-width: 100%;
        }

        form .user-details .input-box {
            margin-bottom: 15px;
            width: 100%;
        }

        form .category {
            width: 100%;
        }

        .content form .user-details {
            max-height: 300px;
            overflow-y: scroll;
        }

        .user-details::-webkit-scrollbar {
            width: 5px;
        }
    }

    @media(max-width: 459px) {
        .container .content .category {
            flex-direction: column;
        }
    }

    form .user-details .input-box2 {
        margin-bottom: 15px;
        width: calc(100% / 1 - 0px);
    }

    form .input-box2 span.details {
        display: block;
        font-weight: 600;
        margin-bottom: 5px;
    }

    .user-details .input-box2 input {
        height: 45px;
        width: 100%;
        outline: none;
        font-size: 16px;
        border-radius: 5px;
        padding-left: 15px;
        border: 1px solid #ccc;
        border-bottom-width: 2px;
        transition: all 0.3s ease;
    }

    .user-details .input-box2 input:focus,
    .user-details .input-box2 input:valid {
        border-color: #9b59b6;
    }
</style>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Form</title>
    
</head>

<body>
    <div class="container">
        <div class="title">Student Registration Form</div>
        <div class="content">
            
            <form method="post" action="<?= base_url('user/login/Auth/student_reg');?>">
            
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Phone Number</span>
                        <input type="number" placeholder="Enter Phone Number" name="student_phonenumber" required>  
                    </div>
                    <div class="input-box">
                        <span class="details">Nationality</span>
                        <input type="text" placeholder="Enter Nationality" name="student_nationality" required>
                    </div>

                    <div class="input-box">
                        <span class="details">Date of Birth</span>
                        <input type="date" name="student_dob"required>
                    </div>
                    <div class="input-box">
                        <span class="details">Interests</span>
                        <input type="text" placeholder="Enter Interests" name="student_interest" required>
                    </div>

                    <div class="input-box2">
                        <span class="details">Current Level</span>
                        <input type="text" placeholder="Enter Current Level" name="student_currentlevel" required>
                    </div>

                <div class="gender-details">
                    <input type="radio" name="student_gender" id="dot-1" value="Male">
                    <input type="radio" name="student_gender" id="dot-2" value="Female">
                    <span class="gender-title">Gender</span>
                    <div class="category">
                        <label for="dot-1">
                            <span class="dot one"></span>
                            <span class="gender">Male</span>
                        </label>
                        <label for="dot-2">
                            <span class="dot two"></span>
                            <span class="gender">Female</span>
                        </label>
                    </div>
              </div>

              
                <div class="button">
                    <input type="submit" value="Register">
                </div>
                
            </form>
        </div>
    </div>

 
</body>
</html>