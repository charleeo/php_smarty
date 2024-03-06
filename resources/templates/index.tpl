{{include file="header.tpl" title="Home Page" }}
<main>
    <section class="py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 align-self-center">
                <div class="card">
                    <div class="card-header">
                        <h1>Register User</h1>
                    </div>
                    <div class="card-body shadow-lg">
                        <form action="/" method="post">

                            <div class="row justify-content-center pt-2">
                                <div class="col-10 form-group">
                                    <label for='username'>Username</label>
                                    <input {if not empty($user_data) && isset($user_data.username)}
                                        value="{$user_data.username}"
                                    {/if} type="text" name="username" class="form-control" placeholder="enter username">
                                </div>
                            </div>

                            <div class="row justify-content-center pt-2">
                                <div class="col-10 form-group">
                                    <label for='email'>Email</label>
                                    <input 
                                    value="{if not empty($user_data) && isset($user_data.email)}{$user_data.email}
                                    {/if}"
                                    type="email" name="email" class="form-control" placeholder="enter your email">
                                </div>
                            </div>
                           
                            <div class="row justify-content-center pt-2">
                                <div class="col-10 form-group">
                                    <label for='password'>Password</label>
                                    <input
                                   
                                     type="password" name="password" class="form-control" placeholder="enter password">
                                </div>
                            </div>
                            <div class="row justify-content-center pt-2">
                                <div class="col-10 form-group">
                                    <button class="btn btn-sm btn-primary">Register</button>
                                </div>
                            </div>

                            </form>
                            
                            <div class="row justify-content-center pt-2">
                                <div class="col-10 form-group">
                                    {if $errors NE []}
                                        <div class="alert alert-warning mt-1 alert-sm">
                                            <h4>Errors:</h4>
                                            <ol>
                                                {foreach $errors as $error}
                                                    
                                                    <li>{$error}</li>
                                                {/foreach}
                                            </ol>
                                        </div>
                                    {else}

                                    {/if}
                                  
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
</body>
</html>
