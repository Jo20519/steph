<form method="POST" action="{{ route('profile.update-payment-plan') }}">
    @csrf
    @method('PATCH')

    <div class="mb-4">
        <label for="payment_plan" class="block text-sm font-medium text-gray-700">{{ __('Select Payment Plan') }}</label>
        <select id="payment_plan" name="payment_plan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            <option value="basic">Basic</option>
            <option value="premium">Premium</option>
            <option value="pro">Pro</option>
        </select>
    </div>

    <div class="flex items-center justify-end">
        <x-primary-button>{{ __('Update Plan') }}</x-primary-button>
    </div>
</form>
