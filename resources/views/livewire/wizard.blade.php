<div>
    @if(!empty($successMessage))
        <div class="alert alert-success">
            {{ $successMessage }}
        </div>
    @endif

    <div class="text-center">
        <!-- progressbar -->
        <ul class="progressbar">
            <li class="{{ $currentStep != 1 ? '' : 'active' }}">Шаг 1</li>
            <li class="{{ $currentStep != 2 ? '' : 'active' }}">Шаг 2</li>
            <li class="{{ $currentStep != 3 ? '' : 'active' }}">Шаг 3</li>
            <li class="{{ $currentStep != 4 ? '' : 'active' }}">Шаг 4</li>
        </ul>
    </div>

    <div class="row setup-content {{ $currentStep != 1 ? 'displayNone' : '' }}" id="step-1">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3>Шаг 1</h3>
                <div class="mb-3>
                <label for="name">Имя:</label>
                <input type="text" wire:model="name" class="form-control" id="name" value="{{$name ?? '' }}"/>
                @error('name') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label for="surname">Фамилия:</label>
                <input type="text" wire:model="surname" class="form-control" id="surname" value="{{$surname ?? '' }}"/>
                @error('surname') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label for="last_name">Отчество:</label>
                <input type="text" wire:model="last_name" class="form-control" id="last_name"
                       value="{{$last_name ?? '' }}"/>
                @error('last_name') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label for="date_of_birth">Дата рождения:</label>
                <input type="date" wire:model="date_of_birth" class="form-control" id="date_of_birth"
                       value="{{$date_of_birth ?? '' }}"/>
                @error('date_of_birth') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label for="gender">Пол:</label>
                @foreach($genders as $sex)
                    <br>
                    <label>
                        <input
                            type="radio"
                            name="gender"
                            value="{{ $sex }}"
                            wire:model="gender">
                        {{ $sex }}
                    </label>
                @endforeach
                <br>
                @error('gender') <span class="error">{{ $message }}</span> @enderror
            </div>
            <button class="btn btn-primary nextBtn btn-lg pull-right" wire:click="firstStepSubmit" type="button">
                Вперед
            </button>
        </div>
    </div>
</div>
<div class="row setup-content {{ $currentStep != 2 ? 'displayNone' : '' }}" id="step-2">
    <div class="col-xs-12">
        <div class="col-md-12">
            <h3>Шаг 2</h3>
            <div class="mb-3">
                <label for="phone">Телефон:</label>
                <input type="tel" wire:model="phone" class="form-control" id="phone" pattern="(\s*)?(\+)?([- _():=+]?\d[- _():=+]?){10,14}(\s*)?" value="{{$phone ?? '' }}"/>
                @error('phone') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label for="city">Город:</label>
                <input type="text" wire:model="city" class="form-control" id="city" value="{{$city ?? '' }}"/>
                @error('city') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label for="email">Электронная почта:</label>
                <input type="email" wire:model="email" class="form-control" id="email" value="{{$email ?? '' }}"/>
                @error('email') <span class="error">{{ $message }}</span> @enderror
            </div>
            <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" wire:click="secondStepSubmit">
                Вперед
            </button>
            <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(1)">Назад</button>
        </div>
    </div>
</div>
<div class="row setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3">
    <div class="col-xs-12">
        <div class="col-md-12">
            <h3>Шаг 3</h3>
            <div class="mb-3">
                <label for="rating">Рейтинг</label>
                <input type="number" min="0" max="10" wire:model="rating" class="form-control" id="rating"
                       value="{{$rating ?? '' }}"/>
                @error('rating') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label for="options">Опции:</label>
                <br>
                @foreach($options as $option)
                    <label>
                        <input
                            type="checkbox"
                            name="options[]"
                            value="{{ $option }}"
                            wire:model="selectedOptions">
                        {{ $option }}
                    </label>
                    <br>
                @endforeach
                @error('selectedOptions') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label for="comment">Комментарий:</label>
                <textarea type="text" wire:model="comment" class="form-control"
                          id="comment">{{{ $comment ?? '' }}}</textarea>
                @error('comment') <span class="error">{{ $message }}</span> @enderror
            </div>
            <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" wire:click="thirdStepSubmit">
                Вперед
            </button>
            <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(2)">Назад</button>
        </div>
    </div>
</div>
<div class="row setup-content {{ $currentStep != 4 ? 'displayNone' : '' }}" id="step-4">
    <div class="col-xs-12">
        <div class="col-md-12">
            <h3>Результат анкетирования</h3>
            <table class="table">
                <tr>
                    <td>Имя:</td>
                    <td><strong>{{$name}}</strong></td>
                </tr>
                <tr>
                    <td>Фамилия:</td>
                    <td><strong>{{$surname}}</strong></td>
                </tr>
                <tr>
                    <td>Отчество:</td>
                    <td><strong>{{$last_name}}</strong></td>
                </tr>
                <tr>
                    <td>Дата рождения:</td>
                    <td><strong>{{$date_of_birth}}</strong></td>
                </tr>
                <tr>
                    <td>Пол:</td>
                    <td><strong>{{$gender}}</strong></td>
                </tr>
                <tr>
                    <td>Телефон:</td>
                    <td><strong>{{$phone}}</strong></td>
                </tr>
                <tr>
                    <td>Город:</td>
                    <td><strong>{{$city}}</strong></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><strong>{{$email}}</strong></td>
                </tr>
                <tr>
                    <td>Рейтинг:</td>
                    <td><strong>{{$rating}}</strong></td>
                </tr>
                <tr>
                    <td>Опции:</td>
                    <td>
                        <strong>
                            @foreach($selectedOptions as $option)
                                <p>{{$option}}</p>
                            @endforeach
                        </strong>
                    </td>
                </tr>
                <tr>
                    <td>Комментарий:</td>
                    <td><strong>{{$comment}}</strong></td>
                </tr>
            </table>
            <button class="btn btn-success btn-lg pull-right" wire:click="submitForm" type="button">Отправить</button>
            <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(3)">Назад</button>
        </div>
    </div>
</div>
</div>

<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('optionsUpdated', function (options) {
            Livewire.find('wizard').set('selectedOptions', options);
            Livewire.find('wizard').set('selectedGender', gender);
        });
    });

    $(function(){
        $("#phone").mask("+7(999) 999-9999");
    });
</script>
