<div>
    <form wire:submit.prevent="saveUserStory">
        @csrf
        <span class="font-weight-bold">Choose The Image For Story</span>
        <div class="form-group d-flex mt-3">
            <input type="file" wire:model="photo" class="form-control  form-control-file" >
            <a href=""></a>

            <input type="submit" id="choose_photo" wire:loading.remove value="publish" class="btn btn-success ">
            <a  class="btn btn-waring" wire:loading> Loading Story ...</a>

        </div>
        @error('photo') <span class="text-danger font-weight-bold">{{$message}}</span> @enderror
    </form>
</div>
