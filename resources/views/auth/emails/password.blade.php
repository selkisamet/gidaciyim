Şifrenizi Sıfırlamak İçin Lİnki Tıklayın: <a href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> {{ $link }} </a>
