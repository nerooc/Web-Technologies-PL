<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:template match="/">
        <html>
            <head>
                <link rel="stylesheet" href="./lab03.css"/>
                <title>Uczelnia</title>
            </head>
            <body>
                <table border="1">

                    <tbody>
                        <th colspan="4" align="center" class="uczelnia">Akademia Górniczo-Hutnicza</th>

                        <xsl:for-each select="uczelnia/wydzial">

                            <xsl:sort select="wydzial/text()"/>

                            <xsl:for-each select="kierunek">

                                <tr class="nazwakierunku">
                                    <th colspan="4" align="center"><xsl:value-of select="nazwakierunku"/></th>
                                </tr>

                                <tr class="spis">
                                    <td align="left">IMIE:</td>
                                    <td align="left">DRUGIE IMIE:</td>
                                    <td align="left">NAZWISKO:</td>
                                    <td align="left">NUMER INDEKSU:</td>
                                </tr>

                                <xsl:for-each select="student">

                                    <xsl:sort select="nazwisko/text()"/>

                                    <tr class="student">
                                        <td align="left"><xsl:value-of select="imie"/></td>
                                        <td align="left"><xsl:value-of select="drugieimie"/></td>
                                        <td align="left"><xsl:value-of select="nazwisko"/></td>
                                        <td align="left"><xsl:value-of select="numeridx"/></td>
                                    </tr>

                                </xsl:for-each>

                            </xsl:for-each>
                            <!-- koniec petli dla wezlow student -->

                        </xsl:for-each>
                        <!-- koniec petli dla wezlow miasto -->
                    </tbody>

                </table>
                <br/>

            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>