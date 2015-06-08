{include file='common/header.tpl'}

<!-- Main Page Content -->
<div class="container">
   <div class="col-md-9">
        {if !$message}   
            <div class="col-sm-12 col-lg-12 col-md-12">
                <hgroup class="mb20">
                    <legend><h3>Mensagens Recebidas</h3></legend>
                </hgroup>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped" width="100%" style="text-align: center;">
                        <tbody>
                            <tr>
                                <td>Assunto</td>
                                <td>Emissor</td>
                                <td>Data</td>
                            </tr>

                            {foreach $received as $message}
                                 <tr>
                                    <td><a href="message.php?id={$message.idmensagem}">{$message.assunto}</td>
                                    <td>{$message.idemissor}</td>
                                    <td>{$message.data}</td>
                                 </tr>
                            {/foreach}

                        </tbody>
                    </table>
                     <hgroup class="mb20">
                        <legend><h3>Mensagens Enviadas</h3></legend>
                    </hgroup>
                    <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped" width="100%" style="text-align: center;">
                        <tbody>
                            <tr>
                                <td>Assunto</td>
                                <td>Receptor</td>
                                <td>Data</td>
                            </tr>
                            {foreach $sended as $message}
                                 <tr>
                                    <td><a href="message.php?id={$message.idmensagem}">{$message.assunto}</td>
                                    <td>{$message.idemissor}</td>
                                    <td>{$message.data}</td>
                                 </tr>
                            {/foreach}
                        </tbody>
                    </table>    
                </div>
            </div>
        {else}
            <div class="col-sm-12 col-lg-12 col-md-12">
                <hgroup class="mb20">
                    <legend><h3>Mensagem</h3></legend>
                </hgroup>
                <div class="table-responsive">
                    <h2>{$message.assunto}</h2>
                    <h4>{$message.utilizador}</h4>
                    <h4>{$message.data}</h4>
                    <textarea name="text" placeholder="{$message.texto}" rows="5" readonly></textarea>
                </div>
            </div>
        {/if}
    </div>
</div>

<!-- Main Page Content -->
{include file='common/footer.tpl'}
