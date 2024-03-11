<?php
/**
 * Process form validation
 */
if (isset($_POST["glpay_api_token"])) {
    update_option("glpay-plugin-api-token", filter_input(INPUT_POST, "glpay_api_token"));
}
?>
<style>
    .glpay__admin-page__header {
        margin-bottom: 20px;
    }

    .form-group {
        padding: 15px 0;
    }

    input[disabled], 
    input[disabled] + label {
        opacity: .6;
    } 

    .form-control {
        display: block;
        width: calc(100% - 1.5rem);
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #212529;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: 0;
    }

    .btn:not(:disabled) {
        cursor: pointer;
    }
    .btn {
        display: inline-block;
        font-weight: 400;
        line-height: 1.5;
        color: #212529;
        text-align: center;
        text-decoration: none;
        vertical-align: middle;
        cursor: pointer;
        background-color: transparent;
        border: 1px solid transparent;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        border-radius: 0;
    }
    .btn-primary {
        color: #fff;
        background-color: #0d6efd;
        border-color: #0d6efd;
    }
</style>
<section>
    <div class="glpay__admin-page__header">
        <h1>GLPay Options</h1>
        <hr>
        <img src="<?= plugin_dir_url(__FILE__) . '../images/logo.jpeg' ?>" alt="GLPay Logo">
    </div>
    <form action="<?php plugin_dir_path(__FILE__) . 'views/admin-page.php' ?>" method="POST">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="glpay-plugin-active" checked="<?= get_option('glpay-plugin-active')=='1' ? 'checked' : '' ?>" disabled>
            <label class="form-check-label" for="glpay-plugin-active">
                Activated
            </label>
        </div>
        <div class="form-group">
            <label for="glpay_api_token" class="form-label">GLPay API Token</label>
            <input id="glpay_api_token" name="glpay_api_token" type="text" class="form-control" value="<?= get_option('glpay-plugin-api-token') ?>" aria-describedby="token-help">
            <div id="token-help" class="form-text">
                If you don't have a token, click on 
                <a href="https://glpay.legrandsoft.com" target="_blank" rel="noopener noreferrer">https://glpay.legrandsoft.com</a> 
                and create a merchand account to obtain a token and start to collect payments.
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</section>