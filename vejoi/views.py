from django.shortcuts import render
from django import http

from . import forms


def index(request):
    return render(request, 'vejoi/index.html')

def signup(request):
    form = forms.SignUpForm(request.POST or None)
    if request.method == 'POST' and form.is_valid():
        form.save()
        return http.HttpResponseRedirect('/')

    return render(request, 'vejoi/signup.html', {
        'form': form
    })

def login(request):
    return render(request, 'vejoi/login.html')

def home(request):
    return render(request, 'vejoi/base.html')