<link rel="stylesheet" href="/static/styles/css/sign.css" type="text/css">

<script src="/static/scripts/js/jquery/jquery.validate.js" type="text/javascript"></script>

<script src="/static/scripts/js/crypto-js.js" type="text/javascript"></script>

<script src="/static/scripts/js/sign.js" type="text/javascript"></script>

<div class="container w-50 h-50">
    <h1 class="text-center">Sign in</h1>
    <form id="sign-form" method="post" action="/sign/postin">
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email"
                   aria-describedby="emailHelp" placeholder="Email..." required>
            <small id="emailHelp" class="form-text text-muted">Email, assigned to your 
                account</small>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password"
                   placeholder="Password..." required minlength="6">
        </div>
        <div class="sign-submit-area">
            <div id="sign-error-field"><?= $data ?? '' ?></div>
            <button id="sign-submit-btn" type="submit" class="btn btn-primary">Sign in</button>
        </div>
    </form>
</div>