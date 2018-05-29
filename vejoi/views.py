from django.shortcuts import render
from django.urls import reverse_lazy
from django.contrib.auth import get_user_model
from django.contrib.auth.views import LoginView, LogoutView
from django.views.generic import DetailView, ListView, CreateView, FormView, UpdateView
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


class AnswerView(UpdateView):
    model = Question
    fields = ['answer']
    success_url = reverse_lazy('home')


class HomeView(ListView, FormView):
    template_name = 'vejoi/home.html'
    model = Question
    fields = ['answer', 'responder']
    form_class = forms.AnswerForm

    def get_queryset(self):
        user = self.request.user
        if user.is_authenticated:
            return user.questions.all()

        else:
            return Question.objects.none()

    def form_valid(self, form):
        form.instance.answer = self.request.POST.get('answer')
        form.save()
        return super().form_valid(form)
