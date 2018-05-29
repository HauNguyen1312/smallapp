from django.shortcuts import render
from django.contrib.auth import get_user_model
from django.contrib.auth.views import LoginView, LogoutView
from django.views.generic import DetailView, ListView
from vejoi.models import Question
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

class HomeView(ListView):
    template_name = 'vejoi/home.html'

    def get_queryset(self):
        user = self.request.user
        if user.is_authenticated:
            return Question.objects.filter(responder_id = user )
            
