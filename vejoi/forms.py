from django import forms

from . import models

class SignUpForm(forms.ModelForm):
    fullname = forms.CharField(label='Full name')
    password = forms.CharField(
        label='Password',
        strip=False,
        widget=forms.PasswordInput,
    )

    class Meta:
        model = models.User
        fields = ['username', 'password', 'email']

    def clean(self):
        super().clean()

        first_name, last_name = self.data.get('fullname').split(' ')
        self.instance.first_name = first_name
        self.instance.last_name = last_name
