<?php
/**
 * Process form validation
 */
if (isset($_POST["glpay_api_token"])) {
    update_option("glpay-plugin-api-token", filter_input(INPUT_POST, "glpay_api_token"));
}
?>
<style>
    .form-group {
        padding: 15px 0;
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
    .btn-dark {
        color: #fff;
        background-color: #212529;
        border-color: #212529;
    }
</style>
<section>
    <form action="<?php plugin_dir_path(__FILE__) . 'views/user-page.php' ?>" method="POST">
        <div class="form-group">
            <button type="submit" class="btn btn-dark">Pay with GLPay</button>
        </div>
    </form>
</section>