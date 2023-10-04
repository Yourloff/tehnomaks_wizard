<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Client;

class Wizard extends Component
{
    public $currentStep = 1;
    public $rating = 0;
    public $surname, $name, $last_name, $date_of_birth, $phone, $city, $email, $comment, $gender;
    public $options = ['Промокоды', 'Экспресс доставка', 'Оплата в рассрочку'];
    public $selectedOptions = [];
    public $genders = ['Мужской', 'Женский'];
    public $successMessage = '';

    protected $messages = [
        'name.required' => 'Необходимо ввести имя в поле.',
        'surname.required' => 'Поле фамилия является обязательным.',
        'last_name.required' => 'Поле отчество является обязательным.',
        'date_of_birth.required' => 'Поле даты рождения обязательно.',
        'date_of_birth.before_or_equal' => 'Поле даты рождения должно быть датой, предшествующей сегодняшней или равной ей.',
        'gender.required' => 'Поле пола обязательно.',
        'phone.required' => 'Необходимо ввести имя в поле.',
        'email.required' => 'Адрес электронной почты не может быть пустым.',
        'email.email' => 'Неверный формат поля электронной почты.',
        'rating.max' => 'Не должно превышать больше 10.',
        'rating.min' => 'Поле рейтинга должно быть не менее 1.',
        'phone.phone' => 'Не соответствует формату телефона: 7XXXXXXXXXX'
    ];

    public function firstStepSubmit()
    {
        $validatedData = $this->validate([
            'surname' => 'required|max:100',
            'name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'date_of_birth' => 'required|date|before_or_equal:today',
            'gender' => 'required'
        ]);

        $this->currentStep = 2;
    }

    public function secondStepSubmit()
    {
        $validatedData = $this->validate([
            'phone' => 'required|numeric|phone:RU',
            'city' => '',
            'email' => 'required|email|max:255',
        ]);

        $this->currentStep = 3;
    }

    public function thirdStepSubmit()
    {
        $validatedData = $this->validate([
            'rating' => 'numeric|min:0|max:10',
            'options' => '',
            'comment' => ''
        ]);

        $this->currentStep = 4;
    }

    public function submitForm()
    {
        Client::create([
            'name' => $this->name,
            'surname' => $this->surname,
            'last_name' => $this->last_name,
            'date_of_birth' => $this->date_of_birth,
            'gender' => $this->gender,
            'phone' => $this->phone,
            'city' => $this->city,
            'email' => $this->email,
            'rating' => $this->rating,
            'options' => json_encode($this->selectedOptions),
            'comment' => $this->comment,
        ]);

        $this->reset();
        $this->currentStep = 1;
        $this->successMessage = 'Анкета успешно отправлена';
    }

    public function back($step)
    {
        $this->currentStep = $step;
    }

    public function render()
    {
        return view('livewire.wizard');
    }
}
