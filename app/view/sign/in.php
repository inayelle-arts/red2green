<link rel="stylesheet" href="/static/styles/css/sign.css" type="text/css">

<div class="container w-50 h-50">
    <h1 class="text-center">Sign in</h1>
    <form id="sign-in-form" method="post" action="/sign/postin">
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email"
                   aria-describedby="emailHelp" placeholder="Email...">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with
                anyone else.
            </small>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password"
                   placeholder="Password...">
        </div>
        <div class="sign-submit-area">
            <div class="sign-error-field"><?= $data ?? '' ?></div>
            <button type="submit" class="btn btn-primary w-50 sign-submit-btn">Sign in</button>
        </div>
    </form>
</div>