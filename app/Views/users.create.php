<h2>Cadastro de Usuário</h2>

<form action="<?php echo base_url('add') ?>" method="post">
    <label for="name">Nome: </label>
     
    <input type="text" name="name" id="name">
    <br><br>
    <label for="email">Email: </label>
     
    <input type="text" name="email" id="email">
    <br><br>
    Gênero:
     
    <input type="radio" name="gender" id="gener_m" value="m">
    <label for="gener_m">Masculino </label>
    <input type="radio" name="gender" id="gener_f" value="f">
    <label for="gener_f">Feminino </label>
    <br><br>
    <label for="birthdate">Data de Nascimento: </label>
     
    <input type="text" name="birthdate" id="birthdate" placeholder="dd/mm/YYYY">
    <br><br>
    <input type="submit" value="Cadastrar">
</form>