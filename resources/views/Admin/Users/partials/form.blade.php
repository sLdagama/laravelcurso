<x-alert/>
@csrf()
<input type="text" name="name" id="name" placeholder="Insira o seu nome" value="{{ $user->name ?? old('name') }}">
<input type="email" name="email" id="email" placeholder="Insira o seu email" value="{{ $user->email ?? old('email') }}">
<input type="password" name="password" id="password" placeholder="Insira a sua senha">
<button type="submit">Carregar</button>