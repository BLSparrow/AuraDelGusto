<!-- Основной блок слайдера -->
<div class="slider shadow_white">

@foreach($categories as $category)
    <!--слайд -->
        <div class="item">
            <img src="{{asset('storage/'.$category->image)}}" alt="{{$category->name}}">
            <div class="slider_fon">
                <h3>{{$category->name}}</h3>
                <span>{{$category->description}}</span>
            </div>
        </div>
@endforeach

<!-- Кнопки-стрелочки -->
    <span class="previous" onclick="previousSlide()">&#10094;</span>
    <span class="next" onclick="nextSlide()">&#10095;</span>
</div>
