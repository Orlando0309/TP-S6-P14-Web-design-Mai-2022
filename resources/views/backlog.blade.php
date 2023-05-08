<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log First</title>
    <link href="{{secure_url('mycss/assets/css/main.css') }}" rel="stylesheet">
</head>
<body>
    <h1>
        IA Blog | ARE YOU IN
    </h1>
    <section>
        <h3>Form</h3>
        <h4>{{message}}</h4>
        <form method="post" action="/admin">
            @csrf
            <div class="row gtr-uniform">
                <div class="col-12 col-6-xsmall">
                    <input type="email" name="identifiant" id="identifiant" value="" placeholder="Email" />
                </div>
  
                <div class="col-12 col-6-xsmall">
                    <input type="password" name="password" id="password" value="" placeholder="Password" />
                </div>
                
                <div class="col-12">
                    <ul class="actions">
                        <li><input type="submit" value="Sign In" /></li>
                        <li><input type="reset" value="Reset" /></li>
                    </ul>
                </div>
            </div>
        </form>
    </section>
</body>
</html>