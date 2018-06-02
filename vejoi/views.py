from django.contrib.auth import logout
from django.contrib.auth.models import User
from django.contrib.auth.views import LoginView, LogoutView
from django.views.generic import DetailView, ListView, CreateView, FormView, UpdateView
from django.shortcuts import render, redirect
from django.urls import reverse, reverse_lazy

from vejoi.models import Question
from vejoi.forms import AskingForm, AnswerForm, SignUpForm


def index(request):
    return render(request, 'vejoi/index.html')


def signup(request):
    if request.method == 'POST':
        form = SignUpForm(request.POST)
        if form.is_valid():
            form.save()
            return redirect('login')
        args = {'form': form}
        return render(request, 'vejoi/signup.html', args)

    else:
        form = SignUpForm()
        args = {'form': form}
        return render(request, 'vejoi/signup.html', args)


def logout_view(request):
    logout(request)
    return redirect('login')


class AnswerView(UpdateView):
    model = Question
    fields = ['answer']
    success_url = reverse_lazy('home')


class HomeView(ListView, FormView):
    template_name = 'vejoi/home.html'
    model = Question
    fields = ['answer', 'responder']
    form_class = AnswerForm

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


class AskView(CreateView):
    model = Question
    fields = ['name', 'text']

    def get_success_url(self):
        return reverse('profile', args=[User.objects.get(pk=self.object.responder_id).username])

    def form_valid(self, form):
        form.instance.name = self.request.POST.get('name')
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
        context['questions'] = self.get_object().questions.exclude(
            answer=None).exclude(answer='')
        return context
