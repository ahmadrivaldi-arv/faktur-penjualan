<div class="card shadow-sm">
    <div class="card-header fw-semibold">
        Edit Data Penjualan
    </div>
    <div class="card-body">
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"
                        aria-label="Close"></button>
            </div>
        @endif

        <form wire:submit.prevent="update">
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="tgl_faktur" class="form-label">Tanggal Faktur</label>
                    <input type="date" id="tgl_faktur"
                           class="form-control @error('tgl_faktur') is-invalid @enderror"
                           wire:model.live="tgl_faktur">
                    @error('tgl_faktur')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="due_date" class="form-label">Jatuh Tempo</label>
                    <input type="date" id="due_date"
                           class="form-control @error('due_date') is-invalid @enderror"
                           wire:model.live="due_date">
                    @error('due_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
                    <select wire:model="metode_pembayaran" class="form-select" name="metode_pembayaran"
                            id="metode_pembayaran">
                        <option value="" selected disabled>-- Pilih Metode Pembayaran --</option>
                        <option @selected($metode_pembayaran === 'Transfer BCA') value="Transfer BCA">
                            Transfer BCA
                        </option>
                        <option @selected($metode_pembayaran === 'Transfer Mandiri') value="Transfer Mandiri">
                            Transfer
                            Mandiri
                        </option>
                        <option @selected($metode_pembayaran === 'Transfer BRI') value="Transfer BRI">
                            Transfer BRI
                        </option>
                        <option @selected($metode_pembayaran === 'Cash') value="Cash">Cash</option>
                    </select>

                    @error('metode_pembayaran')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="user" class="form-label">Sales/User</label>
                    <input type="text" id="user" class="form-control @error('user') is-invalid @enderror"
                           wire:model.live="user" placeholder="Nama user penanggung jawab">
                    @error('user')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="id_customer" class="form-label">Customer</label>
                    <select id="id_customer" class="form-select @error('id_customer') is-invalid @enderror"
                            wire:model.live="id_customer">
                        <option value="">-- Pilih Customer --</option>
                        @foreach ($customerOptions as $customer)
                            <option value="{{ $customer->id_customer }}">{{ $customer->nama_customer }}</option>
                        @endforeach
                    </select>
                    @error('id_customer')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="id_perusahaan" class="form-label">Perusahaan</label>
                    <select id="id_perusahaan" class="form-select @error('id_perusahaan') is-invalid @enderror"
                            wire:model.live="id_perusahaan">
                        <option value="">-- Pilih Perusahaan --</option>
                        @foreach ($perusahaanOptions as $perusahaan)
                            <option value="{{ $perusahaan->id_perusahaan }}">{{ $perusahaan->nama_perusahaan }}</option>
                        @endforeach
                    </select>
                    @error('id_perusahaan')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mt-4">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h6 class="mb-0">Detail Produk</h6>
                    <button type="button" class="btn btn-sm btn-outline-primary" wire:click="addItem">
                        <i class="bi bi-plus-circle"></i> Tambah Item
                    </button>
                </div>
                @error('items')
                <div class="text-danger small mb-2">{{ $message }}</div>
                @enderror

                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="table-light">
                        <tr>
                            <th style="width: 35%;">Produk</th>
                            <th style="width: 15%;">Qty</th>
                            <th style="width: 20%;">Harga</th>
                            <th style="width: 20%;">Subtotal</th>
                            <th style="width: 10%;" class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($items as $index => $item)
                            <tr wire:key="edit-item-{{ $index }}">
                                <td>
                                    <select
                                        class="form-select @error('items.' . $index . '.id_produk') is-invalid @enderror"
                                        wire:model.live="items.{{ $index }}.id_produk">
                                        <option value="">-- Pilih Produk --</option>
                                        @foreach ($produkOptions as $produk)
                                            <option value="{{ $produk->id_produk }}">{{ $produk->nama_produk }}</option>
                                        @endforeach
                                    </select>
                                    @error('items.' . $index . '.id_produk')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </td>
                                <td>
                                    <input type="number" min="1"
                                           class="form-control @error('items.' . $index . '.qty') is-invalid @enderror"
                                           wire:model.live="items.{{ $index }}.qty">
                                    @error('items.' . $index . '.qty')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </td>
                                <td>
                                    <input type="number" min="0"
                                           class="form-control @error('items.' . $index . '.price') is-invalid @enderror"
                                           wire:model.live="items.{{ $index }}.price">
                                    @error('items.' . $index . '.price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </td>
                                <td>
                                    Rp {{ number_format(((int) ($item['qty'] ?? 0)) * ((int) ($item['price'] ?? 0)), 0, ',', '.') }}
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-outline-danger btn-sm"
                                            wire:click="removeItem({{ $index }})"
                                            @if (count($items) <= 1) disabled @endif>
                                        <i class="bi bi-x-lg"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row g-3 mt-2">
                <div class="col-md-3">
                    <label for="ppn" class="form-label">PPN</label>
                    <input type="number" id="ppn" min="0"
                           class="form-control @error('ppn') is-invalid @enderror"
                           wire:model.live="ppn" placeholder="0">
                    @error('ppn')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="dp" class="form-label">DP</label>
                    <input type="number" id="dp" min="0"
                           class="form-control @error('dp') is-invalid @enderror"
                           wire:model.live="dp" placeholder="0">
                    @error('dp')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label class="form-label">Subtotal</label>
                    <div class="form-control bg-light">
                        Rp {{ number_format($this->subtotal, 0, ',', '.') }}
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="grand_total" class="form-label">Grand Total</label>
                    <input type="number" id="grand_total" min="0" readonly
                           class="form-control @error('grand_total') is-invalid @enderror"
                           wire:model.live="grand_total">
                    @error('grand_total')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="d-flex gap-2 mt-4">
                <button type="submit" class="btn btn-primary">
                    Simpan Perubahan
                </button>
                <a href="{{ route('penjualan.index') }}" class="btn btn-outline-secondary">
                    Kembali ke List
                </a>
            </div>
        </form>
    </div>
</div>
