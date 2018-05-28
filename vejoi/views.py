from django.shortcuts import render

# Create your views here.

def index(request):
    return render(request, 'vejoi/index.html')

def login(request):
    return render(request, 'vejoi/login.html')

def home(request):
    return render(request, 'vejoi/base.html')