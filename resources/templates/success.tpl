{{include file="header.tpl" title="Success Page" }}

<body>
    <main>
        <section>
            <div class="row justify-content-center py-4">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h1>Registration Successful</h1>
                        </div>
                        <div class="card-body">
                        <ol class="list-group">
                          {if $data NE []}
                            <li class="list-group-item">Username: {$data.username }</li>
                            <li class="list-group-item">Email: {$data.email}</li>
                            <li class="list-group-item">Password: {$data.password}</li>
                            {else}
                                
                            <li class="list-group-item">No  Data</li>
                          {/if}
                        </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>