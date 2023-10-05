<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Credit extends Model
{
    use HasFactory;

    protected $fillable = ['recipient_id', 'amount', 'term_months', 'interest_rate'];

    public function recipient(): BelongsTo
    {
        return $this->belongsTo(Recipient::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function getCreditId(): string
    {
        return str_pad($this->id, 7, '0', STR_PAD_LEFT);
    }

    public function calculateMonthlyPayment(): float|int
    {
        $monthlyInterestRate = $this->interest_rate / 12 / 100;

        return (($this->amount + ($monthlyInterestRate * $this->term_months * $this->amount))) / $this->term_months;
    }

    public function calculateRemainingBalance(): float|int
    {
        return $this->amount - $this->payments->sum('amount');
    }
}
