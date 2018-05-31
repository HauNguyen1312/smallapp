from django.shortcuts import render, redirect
from django.contrib.auth.models import User
from django.contrib.auth.views import LoginView, LogoutView
from django.urls import reverse, reverse_lazy
from django.views.generic import DetailView, ListView, FormView, CreateView
from vejoi.models import Question
from django import http
from vejoi.forms import SignUpForm, AskingForm


def index(request):
    return render(request, 'vejoi/index.html')

def signup(request):
    if request.method == 'POST':
        form = SignUpForm(request.POST)
        if form.is_valid():
           form.save()
        return redirect('/')

    else:
        form = SignUpForm()
        args = {'form': form}
        return render(request, 'vejoi/signup.html',args)


class HomeView(ListView):
    template_name = 'vejoi/home.html'

    def get_queryset(self):
        user = self.request.user
        if user.is_authenticated:
            return user.questions.all()
 

class AskView(CreateView):
    
    model = Question
    fields = ['name', 'text']

    def get_success_url(self):
        return reverse('profile', args = [User.objects.get(pk= self.object.responder_id).username])

    def form_valid(self, form):
        form.instance.responder_id = self.request.POST.get('responder_id')
        form.save()
        return super().form_valid(form)


class ProfileView(DetailView, FormView):
    template_name = 'vejoi/profile.html'
    slug_field = 'username'
    model = User
    form_class = AskingForm

    def get_context_data(self, *args, **kwargs):
        context = super().get_context_data(*args, **kwargs)
        context['questions'] = self.get_object().questions.exclude(answer=None).exclude(answer='')
        return context

