<h1>Criar ticket</h1>

<form action=" {{ route('supports.store')}} " method="post">
    @csrf()

    <input type="text" placeholder="Assunto" name="subject">
    <br>
    <br>
    <textarea name="body" cols="30" rows="5" placeholder="Descrição"></textarea>
    <br>
    <br>
    <button type="submit">Criar</button>
</form>
