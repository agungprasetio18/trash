<?php

namespace App\Http\Controllers;

use App\Models\Village;
use App\Models\Member;
use App\Services\MemberService;
use App\Repositories\MemberRepository;
use App\Http\Requests\Member\CreateMember;
use App\Http\Requests\Member\UpdateMember;

use Illuminate\Http\Request;


class MemberController extends Controller
{
    public function index()
    {
        return view('member.index');
    }

    public function create()
    {
        $villages = Village::select('id', 'name')->get();

        return view('member.create', compact('villages'));
    }

    public function store(CreateMember $request)
    {
        Member::create($request->all());

        return redirect('/member')->with('success', 'Sukses Menambahkan Member');
    }

    public function edit(Member $member)
    {
        $villages = Village::select('id', 'name')->get();

        return view('member.edit', compact('member', 'villages'));
    }

    public function update(UpdateMember $request, Member $member)
    {
        $member->update($request->all());

        return redirect('/member')->with('success', 'Sukses Mengedit Member');
    }

    public function destroy(Member $member)
    {
        $member->delete();

        return response()->json('Sukses Menghapus Member');
    }

    public function datatables(MemberService $member)
    {
        return $member->getDataTables();
    }

    public function search(Request $request, MemberRepository $member)
    {
        return $member->search($request->name);
    }
}
