<template>
    <div>
        <nav class="navbar navbar-dark navbar-expand-md bg-dark" style="background-color: #b0a9a9;">
            <div class="container-fluid"><a class="navbar-brand" href="#"><strong>SLMC</strong></a><button data-toggle="collapse" data-target="#navcol-1" class="navbar-toggler"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse"
                    id="navcol-1">
                    <ul class="nav navbar-nav">
                        <li role="presentation" class="nav-item"><router-link class="nav-link" to="/">Users</router-link></li>
                        <li role="presentation" class="nav-item"><router-link class="nav-link" to="/posts">Posts</router-link></li>
                        <li role="presentation" class="nav-item"><router-link class="nav-link" to="/albums">Albums</router-link></li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <router-view></router-view>
    </div>
</template>

<script>
export default {
    
}
</script>