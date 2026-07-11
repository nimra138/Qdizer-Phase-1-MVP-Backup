@extends('user.partials.app')

@section('title', 'Quotations')
@section('content')
<style>
    .subscription-page{
    padding:30px;
    background:#f6f7fb;
}

.header-card{
    display:flex;
    justify-content:space-between;
    align-items:center;
    background:#fff;
    padding:25px;
    border-radius:18px;
    box-shadow:0 10px 30px rgba(0,0,0,.08);
    margin-bottom:25px;
}

.header-card h2{
    color:#0e222e;
}

.header-card p{
    color:#6b7280;
}

.upgrade-btn{
    background:#ff8a00;
    color:white;
    border:none;
    padding:12px 22px;
    border-radius:12px;
    cursor:pointer;
}

.current-plan{
    padding:25px;
    margin-bottom:25px;
}

.plan-badge{
    display:inline-block;
    background:#fff3e0;
    color:#ff8a00;
    padding:8px 14px;
    border-radius:20px;
    margin-top:10px;
}

.pricing-grid{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:25px;
}

.price-card{
    background:#fff;
    padding:30px;
    border-radius:18px;
    box-shadow:0 10px 30px rgba(0,0,0,.08);
    position:relative;
}

.price-card h3{
    color:#0e222e;
}

.price{
    font-size:40px;
    font-weight:bold;
    margin:15px 0;
}

.price span{
    font-size:16px;
    color:#6b7280;
}

.price-card ul{
    list-style:none;
    padding:0;
}

.price-card ul li{
    padding:8px 0;
    color:#576661;
}

.price-card button{
    width:100%;
    margin-top:20px;
    background:#0e222e;
    color:white;
    padding:14px;
    border:none;
    border-radius:12px;
}

.popular{
    border:2px solid #ff8a00;
    transform:scale(1.03);
}

.popular-badge{
    position:absolute;
    top:-12px;
    right:20px;
    background:#ff8a00;
    color:white;
    padding:6px 14px;
    border-radius:20px;
}

.billing-history{
    margin-top:30px;
    background:#fff;
    padding:25px;
    border-radius:18px;
}

table{
    width:100%;
    border-collapse:collapse;
}

th,td{
    padding:15px;
    border-bottom:1px solid #e5e7eb;
    text-align:left;
}

.paid{
    color:green;
    font-weight:bold;
}
</style>
<div class="subscription-page">
    <div class="header-card">
        <div>
            <h2>Subscription & Billing</h2>
            <p>Manage your QDizer plan and payments</p>
        </div>
        <button class="upgrade-btn">Upgrade Now</button>
    </div>

    <div class="current-plan card-ui">
        <h3>Current Plan</h3>
        <div class="plan-badge">Free Trial</div>
        <p>7 days remaining</p>
    </div>

    <div class="pricing-grid">
        <div class="price-card">
            <h3>Starter</h3>
            <div class="price">$9<span>/month</span></div>
            <ul>
                <li>5 Quotations</li>
                <li>50 Clients</li>
                <li>Basic Reports</li>
            </ul>
            <button>Select Plan</button>
        </div>

        <div class="price-card popular">
            <span class="popular-badge">Popular</span>
            <h3>Pro</h3>
            <div class="price">$29<span>/month</span></div>
            <ul>
                <li>Unlimited Quotations</li>
                <li>1000 Clients</li>
                <li>Advanced Analytics</li>
                <li>AI Suggestions</li>
            </ul>
            <button>Upgrade</button>
        </div>

        <div class="price-card">
            <h3>Enterprise</h3>
            <div class="price">Custom</div>
            <ul>
                <li>Everything Included</li>
                <li>Priority Support</li>
                <li>Custom Integrations</li>
            </ul>
            <button>Contact Sales</button>
        </div>
    </div>

    <div class="billing-history card-ui">
        <h3>Billing History</h3>
        <table>
            <tr>
                <th>Invoice</th>
                <th>Status</th>
                <th>Amount</th>
                <th>Date</th>
            </tr>
            <tr>
                <td>#INV-001</td>
                <td><span class="paid">Paid</span></td>
                <td>$29</td>
                <td>June 2026</td>
            </tr>
        </table>
    </div>
</div>
@endsection