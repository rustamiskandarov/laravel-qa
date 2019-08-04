
<div class="form-group">
    <label for="question-title">Заголовок</label>
    <input type="text" name="title" class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}" value="{{old('title', $question->title)}}"  id="question-title" placeholder="Введите заголовок вопроса">
    @if($errors->has('title'))
    <div class="invalid-feedback">
        <strong>{{$errors->first('title')}}</strong>
    </div>
    @endif
</div>
<div class="form-group">
    <label for="question-body">Текст вашего вопроса</label>
    <textarea rows="10" name="body" class="form-control {{$errors->has('body') ? 'is-invalid' : ''}}"  type="text" id="question-body" placeholder="Введите тест вопроса">{{old('body', $question->body)}}</textarea>
    @if($errors->has('body'))
    <div class="invalid-feedback">
        <strong>{{$errors->first('body')}}</strong>
    </div>
    @endif
</div>
<div class="form-group">
    <button type="submit" class="btn btn-outline-primary btn-lg" >Сохранить</button>
</div><?php
