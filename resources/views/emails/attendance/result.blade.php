@foreach($contracts as $contract)
    <div>
        <p>Platform: {{ $contract->getPlatform() }}</p>
        <p>Account: {{ $contract->getAccount() }}</p>
        <p>Message: {{ $contract->getMessages() }}</p>
    </div>
@endforeach
