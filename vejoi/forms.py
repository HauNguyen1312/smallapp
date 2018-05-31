from django.contrib.auth import get_user_model
from . import models
from django import forms



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

        name = str(self.data.get('fullname')).rsplit(' ',)
        self.instance.first_name = name[0]
        if len(name)> 1:
            self.instance.last_name = name[1]



class AskingForm(forms.ModelForm):
    class Meta:
        model = models.Question
        fields = ['name', 'text']

class AnswerForm(forms.ModelForm):
    class Meta:
        model = models.Question
        fields = ['answer']
