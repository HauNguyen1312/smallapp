from django.contrib.auth import get_user_model, authenticate
from django.contrib.auth.forms import UserCreationForm
from . import models
from django import forms

class SignUpForm(UserCreationForm):
    username = forms.CharField(
        widget=forms.TextInput(attrs={'placeholder': 'Username'}),
        required = True
    )
    fullname = forms.CharField(
        widget=forms.TextInput(attrs={'placeholder': 'Fullname'}),
        required = True
    )
    email = forms.EmailField(
        widget=forms.TextInput(attrs={'placeholder': 'Email'}),
        required = True
    )
    password1 = forms.CharField(
        strip=False,
        widget=forms.PasswordInput(attrs={'placeholder': 'Password'}),
        required = True
    )

    password2 = forms.CharField(
        strip=False,
        widget=forms.PasswordInput(attrs={'placeholder': 'Password Confirm'}),
        required = True
    )

    class Meta:
        model = models.User
        fields = ['username', 'email', 'password1', 'password2']

    def clean(self):
        super().clean()

        name = str(self.data.get('fullname')).rsplit(' ',)
        self.instance.first_name = name[0]
        if len(name) > 1:
            self.instance.last_name = name[1]
        

class AskingForm(forms.ModelForm):
    anonymous = forms.BooleanField(required=False)
    class Meta:
        model = models.Question
        fields = ['name', 'text']


class AnswerForm(forms.ModelForm):
    class Meta:
        model = models.Question
        fields = ['answer']
