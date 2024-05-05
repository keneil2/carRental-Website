<h1>Thank you for signing UP with Our website Job Nest</h1>
<p>
    to continue the registeration process this is the your varification code : @if (session()->has("varCode"))
        {{session()->get("varCode")}}
    @endif
    go here <a href="{{route("Emailvar.get")}}">verifiy your email here</a>
</p>
