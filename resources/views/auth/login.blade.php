<!DOCTYPE html>
<html>
<head>
    @include('_includes.head')
</head>
<body class="hold-transition login-page">

<div class="login-box">
    <div class="login-logo">
        <a href="/"><b>LOGIN</b>SMP</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <livewire:auth.login />
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

@include('_includes.foot')

</body>
</html>
