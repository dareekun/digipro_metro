<div class="p-5 mt-5">
    <div class="row">
        <div class="cell-6 offset-3">
            <div class="row">
                <div class="cell">
                    <h3>Change Password</h3>
                </div>
            </div>
            <div class="row pt-5">
                <div class="cell-3"><label for="oldpassword">Old Password</label></div>
                <div class="cell-9"><input data-role="input" wire:model.defer="oldpassword" type="password"
                        required id="oldepassword"></div>
            </div>
            <div class="row">
                <div class="cell offset-3">
                @error('oldpassword') <span class="fg-red">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="row">
                <div class="cell-3"><label for="oldpassword">New Password</label></div>
                <div class="cell-9"><input data-role="input" wire:model.defer="newpassword" type="password"
                        required id="newpassword"></div>
            </div>
            <div class="row">
                <div class="cell offset-3">
                @error('newpassword') <span class="fg-red">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="row">
                <div class="cell-3"><label for="oldpassword">Confirm Password</label></div>
                <div class="cell-9"><input data-role="input" wire:model.defer="confirmpassword" type="password"
                        required id="confirmpassword"></div>
            </div>
            <div class="row">
                <div class="cell offset-3">
                @error('confirmpassword') <span class="fg-red">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="row">
                <div class="cell-2 offset-3"><input class="button success" type="submit" value="Save Password" wire:click="save">
                </div>
            </div>
        </div>
    </div>
</div>