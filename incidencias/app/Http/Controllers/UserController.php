<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\Autor;

class UserController extends Controller

{
    protected $usuarios;
 
    public function __construct(Autor $usuarios)
    {
        $this->usuarios = $usuarios;
    }

    public function index()
    {
        $usuarios = $this->usuarios->obtenerUsuarios();
        return view('usuarios.lista', ['usuarios' => $usuarios]);
    }

    public function logout()

    {
        Cookie::queue(Cookie::forget('laravel_session'));
        
        return view('auth.login');
    }

    public function show($id)
    {
        $usuario = $this->usuarios->obtenerUsuarioId($id);
        return view('usuarios.ver', compact('usuario'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $incidencia = new Autor($request->all());
        $incidencia->save();
        return redirect()->action([UserController::class, 'index']);
    }

   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $usuario = $this->usuarios->obtenerUsuarioId($id);
        return view('usuarios.editar', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $usuario = Autor::find($id);
        $usuario->fill($request->all());
        $usuario->save();
        return redirect()->action([UserController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = Autor::find($id);
        $usuario->delete();
        return redirect()->action([UserController::class, 'index']);
    }
}
?>
