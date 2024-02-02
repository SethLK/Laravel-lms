@include("layouts.head")
<style>
    .form-container{
        display: flex;
        align-content: center;
        justify-content: center;
        margin-top: 100px;

    }
    form{
        padding: 20px;
        width: 350px;
        border: 2px black solid;
    }
</style>
<div class="form-container">

    <form>
        <!-- Name input -->
        <div class="form-outline mb-4">
            <input type="text" id="form2Example1" class="form-control" name="name"/>
            <label class="form-label" for="form2Example1">name</label>
        </div>

        <!-- Email input -->
        <div class="form-outline mb-4">
            <input type="email" id="form2Example1" class="form-control" name="email"/>
            <label class="form-label" for="form2Example1">Email address</label>
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
            <input type="password" id="form2Example2" class="form-control" name="password"/>
            <label class="form-label" for="form2Example2">Password</label>
        </div>

        <!-- Confirm Password input -->
        <div class="form-outline mb-4">
            <input type="password" id="form2Example2" class="form-control" name="confirm_password"/>
            <label class="form-label" for="form2Example2">Password</label>
        </div>

        <!-- 2 column grid layout for inline styling -->
{{--        <div class="row mb-4">--}}
{{--            <div class="col d-flex justify-content-center">--}}
{{--                <!-- Checkbox -->--}}
{{--                <div class="form-check">--}}
{{--                    <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked/>--}}
{{--                    <label class="form-check-label" for="form2Example31"> Remember me </label>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="col">--}}
{{--                <!-- Simple link -->--}}
{{--                <a href="#!">Forgot password?</a>--}}
{{--            </div>--}}
{{--        </div>--}}

        <!-- Submit button -->
        <button type="button" class="btn btn-primary btn-block mb-4">Sign up</button>

        <!-- Register buttons -->
        <div class="text-center">
            <p>Already a member? <a href="{{ route("login") }}">Login</a></p>
{{--            <p>or sign up with:</p>--}}
{{--            <button type="button" class="btn btn-link btn-floating mx-1">--}}
{{--                <i class="fab fa-facebook-f"></i>--}}
{{--            </button>--}}

{{--            <button type="button" class="btn btn-link btn-floating mx-1">--}}
{{--                <i class="fab fa-google"></i>--}}
{{--            </button>--}}

{{--            <button type="button" class="btn btn-link btn-floating mx-1">--}}
{{--                <i class="fab fa-twitter"></i>--}}
{{--            </button>--}}

{{--            <button type="button" class="btn btn-link btn-floating mx-1">--}}
{{--                <i class="fab fa-github"></i>--}}
{{--            </button>--}}
        </div>
    </form>
</div>
@include("layouts.foot")
