<!DOCTYPE html>
<html>
<head>
    <title>Url Shortner</title>
    <link href="https://bootswatch.com/paper/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        .jumbotron {
            height: 100vh;
            padding: 40vh;
        }
    </style>
</head>
<body>
    <div class="jumbotron" id="app">
        <form class="form-horizontal" v-on:submit.prevent="onSubmit">
            <fieldset>
                <div class="form-group">
                  <label class="control-label" for="url">Complete URL</label>
                  <input class="form-control" id="url" type="text" placeholder="Enter URL" v-model="url">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Short it!</button>
                </div>
                <div class="alert alert-danger" v-text="message" v-if="invalid"></div>
                <div class="alert alert-success" v-if="status == 200">
                    Registered Succesfully!
                    <p>Your Shorted URL:</p>
                    <p v-text="encoded_url"></p>
                </div>
                <div class="alert alert-danger" v-else-if="status != 0">
                    URL already registered!
                    <p>Your Shorted URL:</p>
                    <p v-text="encoded_url"></p>
                </div>
            </fieldset>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/vue"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="js/app.js"></script>
</body>
</html>