<?xml version="1.0" encoding="UTF-8" ?>

<Form version="1.3" maxVersion="1.9" type="org.netbeans.modules.form.forminfo.JFrameFormInfo">
  <Properties>
    <Property name="defaultCloseOperation" type="int" value="3"/>
    <Property name="resizable" type="boolean" value="false"/>
  </Properties>
  <SyntheticProperties>
    <SyntheticProperty name="formSize" type="java.awt.Dimension" value="-84,-19,0,5,115,114,0,18,106,97,118,97,46,97,119,116,46,68,105,109,101,110,115,105,111,110,65,-114,-39,-41,-84,95,68,20,2,0,2,73,0,6,104,101,105,103,104,116,73,0,5,119,105,100,116,104,120,112,0,0,1,103,0,0,2,-41"/>
    <SyntheticProperty name="formSizePolicy" type="int" value="0"/>
    <SyntheticProperty name="generateSize" type="boolean" value="true"/>
    <SyntheticProperty name="generateCenter" type="boolean" value="true"/>
  </SyntheticProperties>
  <AuxValues>
    <AuxValue name="FormSettings_autoResourcing" type="java.lang.Integer" value="0"/>
    <AuxValue name="FormSettings_autoSetComponentName" type="java.lang.Boolean" value="false"/>
    <AuxValue name="FormSettings_generateFQN" type="java.lang.Boolean" value="true"/>
    <AuxValue name="FormSettings_generateMnemonicsCode" type="java.lang.Boolean" value="false"/>
    <AuxValue name="FormSettings_i18nAutoMode" type="java.lang.Boolean" value="false"/>
    <AuxValue name="FormSettings_layoutCodeTarget" type="java.lang.Integer" value="1"/>
    <AuxValue name="FormSettings_listenerGenerationStyle" type="java.lang.Integer" value="0"/>
    <AuxValue name="FormSettings_variablesLocal" type="java.lang.Boolean" value="false"/>
    <AuxValue name="FormSettings_variablesModifier" type="java.lang.Integer" value="2"/>
  </AuxValues>

  <Layout>
    <DimensionLayout dim="0">
      <Group type="103" groupAlignment="0" attributes="0">
          <Component id="jPanel1" alignment="1" max="32767" attributes="0"/>
          <Group type="102" alignment="0" attributes="0">
              <EmptySpace max="-2" attributes="0"/>
              <Group type="103" groupAlignment="1" max="-2" attributes="0">
                  <Component id="btValoresAdicionais" pref="222" max="32767" attributes="0"/>
                  <Component id="btFormaPagamento" alignment="0" max="32767" attributes="0"/>
                  <Component id="btValoresMinimos" alignment="0" max="32767" attributes="0"/>
                  <Component id="btCriarOrcamento" alignment="0" max="32767" attributes="0"/>
                  <Component id="btAlphaTester" alignment="1" pref="222" max="32767" attributes="0"/>
              </Group>
              <EmptySpace type="unrelated" max="-2" attributes="0"/>
              <Group type="103" groupAlignment="0" attributes="0">
                  <Component id="btNovoCliente" max="32767" attributes="0"/>
                  <Component id="btPesquisaCliente" max="32767" attributes="0"/>
                  <Component id="btOrçamentosAgenda" alignment="0" max="32767" attributes="0"/>
                  <Component id="btOrçamentosAgenda1" alignment="0" max="32767" attributes="0"/>
              </Group>
              <EmptySpace min="-2" pref="247" max="-2" attributes="0"/>
          </Group>
      </Group>
    </DimensionLayout>
    <DimensionLayout dim="1">
      <Group type="103" groupAlignment="0" attributes="0">
          <Group type="102" alignment="0" attributes="0">
              <EmptySpace max="-2" attributes="0"/>
              <Component id="jPanel1" min="-2" max="-2" attributes="0"/>
              <EmptySpace type="separate" max="-2" attributes="0"/>
              <Group type="103" groupAlignment="3" attributes="0">
                  <Component id="btCriarOrcamento" alignment="3" min="-2" max="-2" attributes="0"/>
                  <Component id="btNovoCliente" alignment="3" min="-2" max="-2" attributes="0"/>
              </Group>
              <EmptySpace type="unrelated" max="-2" attributes="0"/>
              <Group type="103" groupAlignment="3" attributes="0">
                  <Component id="btFormaPagamento" alignment="3" min="-2" max="-2" attributes="0"/>
                  <Component id="btPesquisaCliente" alignment="3" min="-2" max="-2" attributes="0"/>
              </Group>
              <EmptySpace type="unrelated" max="-2" attributes="0"/>
              <Group type="103" groupAlignment="3" attributes="0">
                  <Component id="btValoresMinimos" alignment="3" min="-2" max="-2" attributes="0"/>
                  <Component id="btOrçamentosAgenda" alignment="3" min="-2" max="-2" attributes="0"/>
              </Group>
              <EmptySpace max="-2" attributes="0"/>
              <Group type="103" groupAlignment="3" attributes="0">
                  <Component id="btValoresAdicionais" alignment="3" min="-2" max="-2" attributes="0"/>
                  <Component id="btOrçamentosAgenda1" alignment="3" min="-2" max="-2" attributes="0"/>
              </Group>
              <EmptySpace pref="12" max="32767" attributes="0"/>
              <Component id="btAlphaTester" min="-2" max="-2" attributes="0"/>
              <EmptySpace min="-2" pref="28" max="-2" attributes="0"/>
          </Group>
      </Group>
    </DimensionLayout>
  </Layout>
  <SubComponents>
    <Component class="javax.swing.JButton" name="btFormaPagamento">
      <Properties>
        <Property name="font" type="java.awt.Font" editor="org.netbeans.beaninfo.editors.FontEditor">
          <Font name="Segoe UI" size="18" style="0"/>
        </Property>
        <Property name="text" type="java.lang.String" value="Formas de Pagamento"/>
      </Properties>
      <Events>
        <EventHandler event="actionPerformed" listener="java.awt.event.ActionListener" parameters="java.awt.event.ActionEvent" handler="btFormaPagamentoActionPerformed"/>
      </Events>
    </Component>
    <Component class="javax.swing.JButton" name="btAlphaTester">
      <Properties>
        <Property name="text" type="java.lang.String" value="Alpha Tester"/>
      </Properties>
    </Component>
    <Component class="javax.swing.JButton" name="btValoresMinimos">
      <Properties>
        <Property name="font" type="java.awt.Font" editor="org.netbeans.beaninfo.editors.FontEditor">
          <Font name="Segoe UI" size="18" style="0"/>
        </Property>
        <Property name="text" type="java.lang.String" value="Valores M&#xed;nimos"/>
      </Properties>
      <Events>
        <EventHandler event="actionPerformed" listener="java.awt.event.ActionListener" parameters="java.awt.event.ActionEvent" handler="btValoresMinimosActionPerformed"/>
      </Events>
    </Component>
    <Component class="javax.swing.JButton" name="btCriarOrcamento">
      <Properties>
        <Property name="font" type="java.awt.Font" editor="org.netbeans.beaninfo.editors.FontEditor">
          <Font name="Segoe UI" size="18" style="1"/>
        </Property>
        <Property name="text" type="java.lang.String" value="Criar Or&#xe7;amento"/>
      </Properties>
      <Events>
        <EventHandler event="actionPerformed" listener="java.awt.event.ActionListener" parameters="java.awt.event.ActionEvent" handler="btCriarOrcamentoActionPerformed"/>
      </Events>
    </Component>
    <Container class="javax.swing.JPanel" name="jPanel1">
      <Properties>
        <Property name="background" type="java.awt.Color" editor="org.netbeans.beaninfo.editors.ColorEditor">
          <Color blue="0" green="0" red="0" type="rgb"/>
        </Property>
      </Properties>

      <Layout>
        <DimensionLayout dim="0">
          <Group type="103" groupAlignment="0" attributes="0">
              <Component id="jLabel1" alignment="1" pref="711" max="32767" attributes="0"/>
          </Group>
        </DimensionLayout>
        <DimensionLayout dim="1">
          <Group type="103" groupAlignment="0" attributes="0">
              <Group type="102" alignment="1" attributes="0">
                  <EmptySpace max="32767" attributes="0"/>
                  <Component id="jLabel1" min="-2" pref="46" max="-2" attributes="0"/>
                  <EmptySpace max="-2" attributes="0"/>
              </Group>
          </Group>
    