function CommonDialog(datagrid, url, search, form){
    if(!datagrid || typeof(datagrid)!=='string'&&datagrid.trim()!==''){
        throw new Error("datagrid不能为空！");
    }

    this._datagridId = '#'+datagrid;
    this._searchDlgId = '#'+search;
    this._url = function(){
        return url;
    }
    this._formId="#"+form;
    this.init.call(this);
}

CommonDialog.prototype.init = function(){
    this.searchDialog =$(this._searchDlgId).css('display','block').dialog({
        title:'查询'
    });
    this.searchForm = $(this._formId).form();
    this.searchForm.find('input').on('keyup',function(e){
        if(e.keyCode == 13){
            _self.searchData();
        }
    });
    this.searchDialog.dialog('close',true);
    this.searchDialog.dialog('close',true);
    this._datagrid=$(this._datagridId).datagrid({
        url:this.getUrl()+"getBiExchangeRatesByPage.json",
    });
}
